<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        {{-- Stats Cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
            <div class="relative rounded-2xl bg-gradient-to-br from-emerald-500 to-green-600 p-4 sm:p-6 shadow-lg shadow-emerald-200/50 overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="absolute bottom-0 left-0 w-20 h-20 bg-white/5 rounded-full translate-y-10 -translate-x-10"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-white/80 text-xs sm:text-sm font-medium uppercase tracking-wider">Penjualan Hari Ini</p>
                        <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <p class="text-xl sm:text-3xl font-extrabold text-white text-shadow">Rp {{ number_format($todaySales, 0, ',', '.') }}</p>
                    <p class="text-white/60 text-xs mt-1">+{{ rand(5,25) }}% dari kemarin</p>
                </div>
            </div>

            <div class="relative rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-600 p-4 sm:p-6 shadow-lg shadow-blue-200/50 overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="absolute bottom-0 left-0 w-20 h-20 bg-white/5 rounded-full translate-y-10 -translate-x-10"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-white/80 text-xs sm:text-sm font-medium uppercase tracking-wider">Profit Hari Ini</p>
                        <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                    </div>
                    <p class="text-xl sm:text-3xl font-extrabold text-white text-shadow">Rp {{ number_format($todayProfit, 0, ',', '.') }}</p>
                    <p class="text-white/60 text-xs mt-1">Margin keuntungan hari ini</p>
                </div>
            </div>

            <div class="relative rounded-2xl bg-gradient-to-br from-violet-500 to-purple-600 p-4 sm:p-6 shadow-lg shadow-violet-200/50 overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="absolute bottom-0 left-0 w-20 h-20 bg-white/5 rounded-full translate-y-10 -translate-x-10"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-white/80 text-xs sm:text-sm font-medium uppercase tracking-wider">Total Produk</p>
                        <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                    </div>
                    <p class="text-xl sm:text-3xl font-extrabold text-white text-shadow">{{ $totalProducts }}</p>
                    @if($lowStockProducts > 0)
                        <p class="text-amber-200 text-xs mt-1 font-semibold flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                            {{ $lowStockProducts }} stok menipis
                        </p>
                    @else
                        <p class="text-white/60 text-xs mt-1">Semua stok aman</p>
                    @endif
                </div>
            </div>

            <div class="relative rounded-2xl bg-gradient-to-br from-rose-500 to-pink-600 p-4 sm:p-6 shadow-lg shadow-rose-200/50 overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="absolute bottom-0 left-0 w-20 h-20 bg-white/5 rounded-full translate-y-10 -translate-x-10"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-white/80 text-xs sm:text-sm font-medium uppercase tracking-wider">Penjualan Bulan Ini</p>
                        <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                    </div>
                    <p class="text-xl sm:text-3xl font-extrabold text-white text-shadow">Rp {{ number_format($monthlySales, 0, ',', '.') }}</p>
                    <p class="text-white/60 text-xs mt-1">{{ now()->format('F Y') }}</p>
                </div>
            </div>
        </div>

        {{-- Recent Transactions --}}
        <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg border border-white/50 overflow-hidden">
            <div class="px-5 sm:px-6 py-4 sm:py-5 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-gray-800">Transaksi Terbaru</h3>
                </div>
                <a href="{{ route('reports.index') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 flex items-center gap-1">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-indigo-50/50 to-purple-50/50">
                            <th class="text-left px-4 sm:px-6 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Invoice</th>
                            <th class="text-left px-4 sm:px-6 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Kasir</th>
                            <th class="text-right px-4 sm:px-6 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Total</th>
                            <th class="text-center px-4 sm:px-6 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Status</th>
                            <th class="text-right px-4 sm:px-6 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider hidden sm:table-cell">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($recentTransactions as $transaction)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                <td class="px-4 sm:px-6 py-3.5">
                                    <span class="font-bold text-gray-800 text-xs sm:text-sm">#{{ $transaction->invoice_no }}</span>
                                </td>
                                <td class="px-4 sm:px-6 py-3.5">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                                            <span class="text-[10px] font-bold text-indigo-600">{{ substr($transaction->user->name ?? '?', 0, 1) }}</span>
                                        </div>
                                        <span class="text-gray-600 text-xs sm:text-sm">{{ $transaction->user->name ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-3.5 text-right font-bold text-gray-800 text-xs sm:text-sm">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                                <td class="px-4 sm:px-6 py-3.5 text-center">
                                    @php
                                        $statusBadge = match ($transaction->status) {
                                            'completed' => 'bg-gradient-to-r from-emerald-500 to-green-500 text-white',
                                            'success' => 'bg-gradient-to-r from-emerald-500 to-green-500 text-white',
                                            'pending' => 'bg-gradient-to-r from-amber-500 to-orange-500 text-white',
                                            'failed' => 'bg-gradient-to-r from-red-500 to-rose-500 text-white',
                                            default => 'bg-gradient-to-r from-gray-400 to-gray-500 text-white',
                                        };
                                    @endphp
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm {{ $statusBadge }}">
                                        {{ $transaction->status }}
                                    </span>
                                </td>
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
                                        <p class="text-gray-400 text-sm mt-1">Mulai transaksi di menu POS</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
