<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $businessId = auth()->user()->business_id;

        $todaySales = Transaction::where('business_id', $businessId)
            ->whereDate('created_at', today())
            ->sum('total');

        $todayProfit = Transaction::where('business_id', $businessId)
            ->whereDate('created_at', today())
            ->sum('profit');

        $totalProducts = Product::where('business_id', $businessId)->count();
        $lowStockProducts = Product::where('business_id', $businessId)->where('stock', '<=', 5)->count();

        $monthlySales = Transaction::where('business_id', $businessId)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');

        $recentTransactions = Transaction::where('business_id', $businessId)
            ->with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'todaySales', 'todayProfit', 'totalProducts', 'lowStockProducts',
            'monthlySales', 'recentTransactions'
        ));
    }
}
