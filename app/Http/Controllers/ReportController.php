<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $businessId = auth()->user()->business_id;

        $startDate = $request->start_date ?: now()->startOfMonth()->format('Y-m-d');
        $endDate = $request->end_date ?: now()->format('Y-m-d');

        $transactions = Transaction::where('business_id', $businessId)
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->with('user')
            ->latest()
            ->paginate(15);

        $summary = Transaction::where('business_id', $businessId)
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->select(
                DB::raw('COUNT(*) as total_transactions'),
                DB::raw('SUM(total) as total_omset'),
                DB::raw('SUM(profit) as total_profit')
            )
            ->first();

        $chartData = Transaction::where('business_id', $businessId)
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total) as total'),
                DB::raw('SUM(profit) as profit')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $topProducts = TransactionItem::whereHas('transaction', function ($q) use ($businessId, $startDate, $endDate) {
                $q->where('business_id', $businessId)
                  ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
            })
            ->select('product_id', DB::raw('SUM(quantity) as total_qty'), DB::raw('SUM(subtotal) as total_sales'))
            ->groupBy('product_id')
            ->with('product')
            ->orderBy('total_qty', 'desc')
            ->take(10)
            ->get();

        return view('reports.index', compact(
            'transactions', 'summary', 'chartData', 'topProducts',
            'startDate', 'endDate'
        ));
    }
}
