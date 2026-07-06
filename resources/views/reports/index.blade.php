<x-app-layout>
    <x-slot name="header">
        Laporan Penjualan
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg border border-white/50 p-4 sm:p-6">
            <form method="GET" action="{{ route('reports.index') }}" class="flex flex-col sm:flex-row items-end gap-3">
                <div class="flex-1 w-full">
                    <label for="start_date" class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal Mulai</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $startDate }}"
                        class="w-full rounded-xl border-2 border-indigo-100 shadow-sm focus:border-indigo-400 focus:ring-indigo-400 text-sm p-2.5 touch-btn bg-white/80">
                </div>
                <div class="flex-1 w-full">
                    <label for="end_date" class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal Akhir</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $endDate }}"
                        class="w-full rounded-xl border-2 border-indigo-100 shadow-sm focus:border-indigo-400 focus:ring-indigo-400 text-sm p-2.5 touch-btn bg-white/80">
                </div>
                <button type="submit"
                    class="w-full sm:w-auto bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-indigo-200 transition-all duration-200 touch-btn">
                    Filter
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
            <div class="relative rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-600 p-5 sm:p-6 shadow-lg shadow-blue-200/50 overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center backdrop-blur">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        </div>
                        <p class="text-white/80 text-sm font-medium uppercase tracking-wider">Total Transaksi</p>
                    </div>
                    <p class="text-3xl font-extrabold text-white text-shadow">{{ $summary->total_transactions }}</p>
                </div>
            </div>
            <div class="relative rounded-2xl bg-gradient-to-br from-emerald-500 to-green-600 p-5 sm:p-6 shadow-lg shadow-emerald-200/50 overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center backdrop-blur">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <p class="text-white/80 text-sm font-medium uppercase tracking-wider">Total Omset</p>
                    </div>
                    <p class="text-3xl font-extrabold text-white text-shadow">Rp {{ number_format($summary->total_omset, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="relative rounded-2xl bg-gradient-to-br from-violet-500 to-purple-600 p-5 sm:p-6 shadow-lg shadow-violet-200/50 overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center backdrop-blur">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                        <p class="text-white/80 text-sm font-medium uppercase tracking-wider">Total Profit</p>
                    </div>
                    <p class="text-3xl font-extrabold text-white text-shadow">Rp {{ number_format($summary->total_profit, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        @if(count($chartData) > 0)
        <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg border border-white/50 p-4 sm:p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Grafik Penjualan Harian</h3>
            </div>
            <div class="space-y-1.5">
                @foreach($chartData as $data)
                <div class="flex items-center gap-2 group">
                    <span class="text-xs w-20 shrink-0 text-gray-600 font-medium">{{ \Carbon\Carbon::parse($data->date)->format('d M') }}</span>
                    <div class="flex-1 bg-gradient-to-r from-gray-100 to-indigo-50/50 rounded-full h-7 overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 transition-all duration-500 group-hover:from-indigo-600 group-hover:to-purple-600" style="width: {{ ($data->total / $chartData->max('total')) * 100 }}%"></div>
                    </div>
                    <span class="text-xs w-24 text-right text-gray-700 font-semibold shrink-0">Rp {{ number_format($data->total, 0, ',', '.') }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if(count($topProducts) > 0)
        <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg border border-white/50 p-4 sm:p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Produk Terlaris</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-amber-50/50 to-orange-50/50">
                            <th class="text-left px-4 py-3 font-bold text-gray-600 text-xs uppercase tracking-wider">Produk</th>
                            <th class="text-center px-4 py-3 font-bold text-gray-600 text-xs uppercase tracking-wider">Total Qty</th>
                            <th class="text-right px-4 py-3 font-bold text-gray-600 text-xs uppercase tracking-wider">Total Penjualan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($topProducts as $product)
                        <tr class="hover:bg-amber-50/30 transition-colors">
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $product->product->name }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 text-indigo-700 font-bold text-sm">{{ $product->total_qty }}</span>
                            </td>
                            <td class="px-4 py-3 text-right font-bold text-gray-800">Rp {{ number_format($product->total_sales, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg border border-white/50 overflow-hidden">
            <div class="px-5 sm:px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Riwayat Transaksi</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-indigo-50/50 to-purple-50/50">
                            <th class="text-left px-4 sm:px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Invoice</th>
                            <th class="text-left px-4 sm:px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Kasir</th>
                            <th class="text-right px-4 sm:px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Total</th>
                            <th class="text-right px-4 sm:px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Profit</th>
                            <th class="text-right px-4 sm:px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider hidden sm:table-cell">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($transactions as $transaction)
                        <tr class="hover:bg-indigo-50/30 transition-colors">
                            <td class="px-4 sm:px-6 py-3.5 font-bold text-gray-800">#{{ $transaction->invoice_no }}</td>
                            <td class="px-4 sm:px-6 py-3.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                                        <span class="text-[10px] font-bold text-indigo-600">{{ substr($transaction->user->name ?? '?', 0, 1) }}</span>
                                    </div>
                                    <span class="text-gray-600">{{ $transaction->user->name ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="px-4 sm:px-6 py-3.5 text-right font-bold text-gray-800">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                            <td class="px-4 sm:px-6 py-3.5 text-right font-semibold text-emerald-600">Rp {{ number_format($transaction->profit, 0, ',', '.') }}</td>
                            <td class="px-4 sm:px-6 py-3.5 text-right text-gray-500 text-xs hidden sm:table-cell">{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    </div>
                                    <p class="text-gray-500 font-medium">Belum ada transaksi</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-4 sm:px-6 py-4 border-t border-gray-100">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
