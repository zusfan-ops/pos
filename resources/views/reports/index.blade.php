<x-app-layout>
    <x-slot name="header">
        Laporan Penjualan
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-6">
            <form method="GET" action="{{ route('reports.index') }}" class="flex flex-col sm:flex-row items-end gap-3">
                <div class="flex-1 w-full">
                    <label for="start_date" class="block text-sm font-medium text-gray-600 mb-1">Start Date</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $startDate }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 border touch-btn">
                </div>
                <div class="flex-1 w-full">
                    <label for="end_date" class="block text-sm font-medium text-gray-600 mb-1">End Date</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $endDate }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 border touch-btn">
                </div>
                <button type="submit" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-8 rounded-xl shadow-sm transition-colors touch-btn">
                    Filter
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-blue-500">
                <p class="text-sm font-medium text-gray-500">Total Transaksi</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $summary->total_transactions }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-green-500">
                <p class="text-sm font-medium text-gray-500">Total Omset (Rp)</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">Rp {{ number_format($summary->total_omset, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-amber-500">
                <p class="text-sm font-medium text-gray-500">Total Profit (Rp)</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">Rp {{ number_format($summary->total_profit, 0, ',', '.') }}</p>
            </div>
        </div>

        @if(count($chartData) > 0)
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Grafik Penjualan Harian</h3>
            <div class="space-y-1">
                @foreach($chartData as $data)
                <div class="flex items-center gap-2">
                    <span class="text-xs w-20 shrink-0 text-gray-600">{{ $data->date }}</span>
                    <div class="flex-1 bg-gray-100 rounded-full h-6 overflow-hidden">
                        <div class="bg-indigo-500 rounded-full h-6 transition-all duration-300" style="width: {{ ($data->total / $chartData->max('total')) * 100 }}%"></div>
                    </div>
                    <span class="text-xs w-24 text-right text-gray-700 font-medium shrink-0">Rp {{ number_format($data->total, 0, ',', '.') }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if(count($topProducts) > 0)
        <div class="bg-white rounded-2xl shadow-sm p-4 sm:p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Produk Terlaris</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-4 py-3 font-medium text-gray-500">Product</th>
                            <th class="text-center px-4 py-3 font-medium text-gray-500">Total Qty</th>
                            <th class="text-right px-4 py-3 font-medium text-gray-500">Total Sales</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($topProducts as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $product->product->name }}</td>
                            <td class="px-4 py-3 text-center text-gray-600">{{ $product->total_qty }}</td>
                            <td class="px-4 py-3 text-right text-gray-900">Rp {{ number_format($product->total_sales, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="px-4 sm:px-6 py-5 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Transactions</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-4 sm:px-6 py-4 font-medium text-gray-500">Invoice</th>
                            <th class="text-left px-4 sm:px-6 py-4 font-medium text-gray-500">Cashier</th>
                            <th class="text-right px-4 sm:px-6 py-4 font-medium text-gray-500">Total</th>
                            <th class="text-right px-4 sm:px-6 py-4 font-medium text-gray-500">Profit</th>
                            <th class="text-right px-4 sm:px-6 py-4 font-medium text-gray-500">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($transactions as $transaction)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 sm:px-6 py-4 font-medium text-gray-900">#{{ $transaction->invoice_no }}</td>
                            <td class="px-4 sm:px-6 py-4 text-gray-600">{{ $transaction->user->name ?? 'N/A' }}</td>
                            <td class="px-4 sm:px-6 py-4 text-right font-medium text-gray-900">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                            <td class="px-4 sm:px-6 py-4 text-right text-gray-700">Rp {{ number_format($transaction->profit, 0, ',', '.') }}</td>
                            <td class="px-4 sm:px-6 py-4 text-right text-gray-500">{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 sm:px-6 py-12 text-center text-gray-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                No transactions found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
