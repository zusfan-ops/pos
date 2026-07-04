<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $business = Business::create([
            'name' => 'Toko Maju Jaya',
            'slug' => 'toko-maju-jaya',
            'address' => 'Jl. Merdeka No. 123, Jakarta',
            'phone' => '021-12345678',
            'currency' => 'Rp',
        ]);

        User::create([
            'business_id' => $business->id,
            'name' => 'Andi Owner',
            'email' => 'owner@demo.com',
            'password' => Hash::make('password'),
            'role' => 'owner',
            'phone' => '081234567890',
            'is_active' => true,
        ]);

        User::create([
            'business_id' => $business->id,
            'name' => 'Siti Staff',
            'email' => 'staff@demo.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'phone' => '081234567891',
            'is_active' => true,
        ]);

        $categories = [];
        $categoryNames = ['Makanan', 'Minuman', 'Snack', 'Sembako', 'Alat Tulis'];
        foreach ($categoryNames as $name) {
            $categories[] = Category::create([
                'business_id' => $business->id,
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }

        $productData = [
            ['Nasi Goreng', 8000, 15000, 50, 'pcs', 0],
            ['Mie Goreng', 6000, 12000, 50, 'pcs', 0],
            ['Ayam Goreng', 10000, 20000, 30, 'pcs', 0],
            ['Es Teh Manis', 2000, 5000, 100, 'gelas', 1],
            ['Es Jeruk', 2500, 6000, 80, 'gelas', 1],
            ['Kopi Susu', 3000, 8000, 60, 'gelas', 1],
            ['Air Mineral', 1000, 3000, 100, 'botol', 1],
            ['Keripik Singkong', 5000, 10000, 40, 'pcs', 2],
            ['Kacang Goreng', 4000, 8000, 45, 'pcs', 2],
            ['Roti Bakar', 7000, 15000, 25, 'pcs', 0],
            ['Beras 5kg', 55000, 70000, 20, 'karung', 3],
            ['Minyak Goreng 1L', 13000, 18000, 30, 'botol', 3],
            ['Gula Pasir 1kg', 12000, 16000, 35, 'kg', 3],
            ['Telur 1kg', 22000, 28000, 25, 'kg', 3],
            ['Buku Tulis', 3000, 6000, 100, 'pcs', 4],
            ['Pulpen', 2000, 4000, 100, 'pcs', 4],
            ['Pensil', 1500, 3000, 100, 'pcs', 4],
            ['Penghapus', 1000, 2000, 50, 'pcs', 4],
        ];

        foreach ($productData as [$name, $purchase, $selling, $stock, $unit, $catIdx]) {
            Product::create([
                'business_id' => $business->id,
                'category_id' => $categories[$catIdx]->id,
                'name' => $name,
                'sku' => 'SKU-' . strtoupper(Str::random(6)),
                'purchase_price' => $purchase,
                'selling_price' => $selling,
                'stock' => $stock,
                'unit' => $unit,
            ]);
        }

        $customerNames = ['Budi Santoso', 'Dewi Lestari', 'Eko Prasetyo', 'Fitri Handayani', 'Gunawan Saputra'];
        foreach ($customerNames as $name) {
            Customer::create([
                'business_id' => $business->id,
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@email.com',
                'phone' => '08' . rand(1000000000, 9999999999),
                'address' => 'Jl. Contoh No. ' . rand(1, 100) . ', Jakarta',
            ]);
        }

        $products = Product::where('business_id', $business->id)->get();
        $customers = Customer::where('business_id', $business->id)->get();

        for ($i = 0; $i < 20; $i++) {
            $date = now()->subDays(rand(0, 29))->setTime(rand(8, 20), rand(0, 59));
            $itemCount = rand(1, 5);
            $total = 0;
            $profit = 0;
            $items = [];

            for ($j = 0; $j < $itemCount; $j++) {
                $product = $products->random();
                $qty = rand(1, 3);
                $subtotal = $product->selling_price * $qty;
                $itemProfit = ($product->selling_price - $product->purchase_price) * $qty;
                $total += $subtotal;
                $profit += $itemProfit;
                $items[] = [
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price' => $product->selling_price,
                    'cost' => $product->purchase_price,
                    'subtotal' => $subtotal,
                    'created_at' => $date,
                    'updated_at' => $date,
                ];
            }

            $transaction = Transaction::create([
                'business_id' => $business->id,
                'user_id' => User::where('business_id', $business->id)->inRandomOrder()->first()->id,
                'customer_id' => rand(0, 1) ? $customers->random()->id : null,
                'invoice_no' => 'INV-' . $date->format('Ymd') . '-' . strtoupper(Str::random(6)),
                'total' => $total,
                'profit' => $profit,
                'payment_amount' => $total + rand(0, 5000),
                'change_amount' => rand(0, 5000),
                'payment_method' => ['cash', 'transfer', 'qris'][rand(0, 2)],
                'status' => 'completed',
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            foreach ($items as $item) {
                $item['transaction_id'] = $transaction->id;
                TransactionItem::create($item);
            }
        }
    }
}
