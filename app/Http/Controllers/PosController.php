<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PosController extends Controller
{
    public function index()
    {
        $businessId = auth()->user()->business_id;
        $categories = Category::where('business_id', $businessId)->get();
        $products = Product::where('business_id', $businessId)->where('stock', '>', 0)->get()->map(function ($p) {
            $p->image_url = $p->image ? Storage::url($p->image) : null;
            return $p;
        });
        $customers = Customer::where('business_id', $businessId)->get();
        $cart = session()->get('cart', []);

        if (request()->wantsJson()) {
            return response()->json(['cart' => array_values($cart)]);
        }

        return view('pos.index', compact('categories', 'products', 'customers', 'cart'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->product_id)
            ->where('business_id', auth()->user()->business_id)
            ->firstOrFail();

        $cart = session()->get('cart', []);
        $quantity = $request->quantity ?? 1;

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->selling_price,
                'cost' => $product->purchase_price,
                'quantity' => $quantity,
                'stock' => $product->stock,
                'image' => $product->image,
                'image_url' => $product->image ? Storage::url($product->image) : null,
            ];
        }

        if ($cart[$product->id]['quantity'] > $product->stock) {
            $cart[$product->id]['quantity'] = $product->stock;
        }

        session()->put('cart', $cart);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cart' => array_values(session()->get('cart', [])),
            ]);
        }

        return redirect()->route('pos.index')->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = max(1, min($request->quantity, $cart[$request->product_id]['stock']));
            session()->put('cart', $cart);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cart' => array_values(session()->get('cart', [])),
            ]);
        }

        return redirect()->route('pos.index');
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'cart' => array_values(session()->get('cart', [])),
            ]);
        }

        return redirect()->route('pos.index');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Keranjang belanja kosong']);
            }
            return redirect()->route('pos.index')->with('error', 'Keranjang belanja kosong');
        }

        $request->validate([
            'payment_method' => 'required|in:cash,transfer,qris',
            'payment_amount' => 'required|numeric|min:0',
            'customer_id' => 'nullable|exists:customers,id',
        ]);

        $businessId = auth()->user()->business_id;
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $profit = collect($cart)->sum(fn($item) => ($item['price'] - $item['cost']) * $item['quantity']);

        if ($request->payment_amount < $total) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Pembayaran kurang dari total belanja']);
            }
            return redirect()->route('pos.index')->with('error', 'Pembayaran kurang dari total belanja');
        }

        DB::beginTransaction();
        try {
            $transaction = Transaction::create([
                'business_id' => $businessId,
                'user_id' => auth()->id(),
                'customer_id' => $request->customer_id,
                'invoice_no' => 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(6)),
                'total' => $total,
                'profit' => $profit,
                'payment_amount' => $request->payment_amount,
                'change_amount' => $request->payment_amount - $total,
                'payment_method' => $request->payment_method,
                'status' => 'completed',
            ]);

            foreach ($cart as $item) {
                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'cost' => $item['cost'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);

                Product::where('id', $item['id'])->decrement('stock', $item['quantity']);
            }

            DB::commit();
            session()->forget('cart');

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('pos.receipt', $transaction->id),
                ]);
            }

            return redirect()->route('pos.receipt', $transaction->id);
        } catch (\Exception $e) {
            DB::rollBack();
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Transaksi gagal: ' . $e->getMessage()]);
            }
            return redirect()->route('pos.index')->with('error', 'Transaksi gagal: ' . $e->getMessage());
        }
    }

    public function receipt(Transaction $transaction)
    {
        if ($transaction->business_id !== auth()->user()->business_id) {
            abort(403);
        }
        $transaction->load('items.product', 'user', 'customer');
        return view('pos.receipt', compact('transaction'));
    }
}
