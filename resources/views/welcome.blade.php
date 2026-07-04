<x-landing-layout>
    {{-- HERO --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 pt-6 sm:pt-10 lg:pt-16 pb-16 sm:pb-20 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
        <div class="text-center lg:text-left">
            <span class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-700 text-xs font-semibold px-3 py-1.5 rounded-full mb-5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                {{ __('Dipercaya pelaku UMKM Indonesia') }}
            </span>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight tracking-tight">
                {{ __('Satu Aplikasi untuk') }}
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-violet-600 to-fuchsia-600">{{ __('Kasir, Stok & Laporan') }}</span>
                {{ __('Bisnis Anda') }}
            </h1>

            <p class="mt-5 text-base sm:text-lg text-gray-600 max-w-xl mx-auto lg:mx-0">
                {{ __(':app membantu Anda mencatat penjualan, mengelola stok, dan memantau performa toko — kapan saja, di mana saja, bahkan saat offline.', ['app' => config('app.name', 'POS UMKM')]) }}
            </p>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-sm sm:text-base font-bold text-white bg-gradient-to-r from-indigo-600 to-violet-600 shadow-lg shadow-indigo-200 hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 active:scale-95 transition-all touch-btn">
                        {{ __('Daftar Gratis — 30 Detik') }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                @endif
                <a href="#fitur"
                   class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 rounded-xl text-sm sm:text-base font-semibold text-gray-700 bg-white border border-gray-200 hover:border-indigo-300 hover:text-indigo-700 transition-colors touch-btn">
                    {{ __('Lihat Fitur') }}
                </a>
            </div>

            <p class="mt-4 text-xs text-gray-400">{{ __('Tanpa kartu kredit. Langsung pakai setelah daftar.') }}</p>
        </div>

        {{-- Dynamic mockup / stat collage --}}
        <div class="relative mx-auto w-full max-w-md lg:max-w-none select-none">
            <div class="relative bg-white rounded-3xl shadow-2xl border border-gray-100 p-1.5 rotate-1 hover:rotate-0 transition-transform duration-500">
                <div class="rounded-[1.35rem] overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-violet-600 px-5 py-4 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-white/40"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-white/40"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-white/60"></span>
                        </div>
                        <span class="text-white/90 text-xs font-semibold">{{ config('app.name', 'POS UMKM') }} · Dashboard</span>
                    </div>
                    <div class="bg-gray-50 p-4 sm:p-5 space-y-3">
                        <div class="bg-white rounded-2xl p-4 shadow-sm border-l-4 border-green-500 flex items-center justify-between">
                            <div>
                                <p class="text-xs text-gray-400">{{ __('Penjualan Hari Ini') }}</p>
                                <p class="text-xl font-bold text-gray-900 mt-0.5">Rp 1.250.000</p>
                            </div>
                            <div class="bg-green-100 p-2.5 rounded-xl">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white rounded-2xl p-3.5 shadow-sm">
                                <p class="text-xs text-gray-400">{{ __('Transaksi') }}</p>
                                <p class="text-lg font-bold text-gray-900">24</p>
                            </div>
                            <div class="bg-white rounded-2xl p-3.5 shadow-sm">
                                <p class="text-xs text-gray-400">{{ __('Kasir Aktif') }}</p>
                                <p class="text-lg font-bold text-gray-900">3</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl p-3.5 shadow-sm flex items-center gap-2">
                            <div class="flex-1 h-2 rounded-full bg-gray-100 overflow-hidden">
                                <div class="h-full w-2/3 rounded-full bg-gradient-to-r from-indigo-500 to-violet-500"></div>
                            </div>
                            <span class="text-xs font-semibold text-gray-500 shrink-0">{{ __('Target bulan ini') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Floating badge cards --}}
            <div class="hidden sm:flex absolute -top-5 -left-6 items-center gap-2 bg-white rounded-xl shadow-lg border border-gray-100 px-3.5 py-2.5 -rotate-6 hover:rotate-0 transition-transform duration-500">
                <div class="bg-amber-100 p-1.5 rounded-lg">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-gray-900">{{ __('3 Stok Menipis') }}</p>
                </div>
            </div>

            <div class="hidden sm:flex absolute -bottom-4 -right-4 items-center gap-2 bg-white rounded-xl shadow-lg border border-gray-100 px-3.5 py-2.5 rotate-6 hover:rotate-0 transition-transform duration-500">
                <div class="bg-emerald-100 p-1.5 rounded-lg">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-gray-900">{{ __('Transaksi Berhasil') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURES --}}
    <section id="fitur" class="bg-gray-50/70 border-y border-gray-100 py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">{{ __('Semua yang dibutuhkan tokomu, tanpa yang tidak perlu') }}</h2>
                <p class="mt-3 text-gray-600">{{ __('Dirancang untuk kecepatan di lapangan — tambah produk, jual, cetak struk, maksimal dua ketuk.') }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="bg-indigo-100 w-11 h-11 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ __('Kasir Kilat') }}</h3>
                    <p class="text-sm text-gray-500 mt-1.5">{{ __('Transaksi cepat dengan tampilan sentuh yang nyaman dipakai di toko.') }}</p>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="bg-purple-100 w-11 h-11 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ __('Multi Kasir & Staff') }}</h3>
                    <p class="text-sm text-gray-500 mt-1.5">{{ __('Undang staff, setiap akun punya hak akses sendiri yang aman.') }}</p>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="bg-amber-100 w-11 h-11 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ __('Stok Real-time') }}</h3>
                    <p class="text-sm text-gray-500 mt-1.5">{{ __('Stok otomatis berkurang tiap transaksi, ada peringatan stok menipis.') }}</p>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="bg-green-100 w-11 h-11 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ __('Laporan Lengkap') }}</h3>
                    <p class="text-sm text-gray-500 mt-1.5">{{ __('Pantau penjualan harian, laba, dan performa toko dalam satu dashboard.') }}</p>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="bg-rose-100 w-11 h-11 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h6m-6-4h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ __('Cetak & Kirim Struk') }}</h3>
                    <p class="text-sm text-gray-500 mt-1.5">{{ __('Struk rapi siap cetak atau dikirim langsung ke pelanggan.') }}</p>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                    <div class="bg-sky-100 w-11 h-11 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01M5.5 12.5a11 11 0 0113 0M2 8.82a15.5 15.5 0 0120 0"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ __('Bisa Offline (PWA)') }}</h3>
                    <p class="text-sm text-gray-500 mt-1.5">{{ __('Pasang ke layar utama, tetap bisa dipakai walau sinyal lemah.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-16 sm:py-20">
        <div class="relative overflow-hidden bg-gradient-to-r from-indigo-600 via-violet-600 to-fuchsia-600 rounded-3xl px-6 sm:px-12 py-12 sm:py-16 text-center shadow-xl">
            <div class="pointer-events-none absolute -top-10 -right-10 w-56 h-56 bg-white/10 rounded-full blur-2xl"></div>
            <div class="pointer-events-none absolute -bottom-10 -left-10 w-56 h-56 bg-white/10 rounded-full blur-2xl"></div>
            <h2 class="relative text-2xl sm:text-3xl font-extrabold text-white">{{ __('Mulai kelola tokomu hari ini') }}</h2>
            <p class="relative mt-3 text-indigo-100 max-w-lg mx-auto">{{ __('Gratis untuk mulai, siap pakai dalam dua menit.') }}</p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="relative mt-7 inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-xl text-sm sm:text-base font-bold text-indigo-700 bg-white shadow-lg hover:-translate-y-0.5 active:translate-y-0 active:scale-95 transition-all touch-btn">
                    {{ __('Daftar Gratis Sekarang') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            @endif
        </div>
    </section>
</x-landing-layout>
