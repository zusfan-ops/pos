<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#4f46e5">
        <meta name="description" content="{{ config('app.name', 'POS UMKM') }} — aplikasi kasir, stok, dan laporan untuk pelaku UMKM.">
        <link rel="manifest" href="/manifest.json">
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" type="image/svg+xml" href="/icons/icon.svg">
        <link rel="apple-touch-icon" href="/icons/icon-192.png">

        <title>{{ config('app.name', 'POS UMKM') }} - @yield('title', 'Kasir, Stok & Laporan dalam Satu Aplikasi')</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .touch-btn { min-height: 44px; }
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-900 bg-white">
        <x-pwa-install-banner />

        <div class="relative overflow-hidden" x-data="{ mobileNavOpen: false }">
            <div class="pointer-events-none absolute -top-32 -right-24 w-[28rem] h-[28rem] bg-indigo-300/35 rounded-full blur-3xl"></div>
            <div class="pointer-events-none absolute top-1/3 -left-32 w-96 h-96 bg-violet-300/25 rounded-full blur-3xl"></div>
            <div class="pointer-events-none absolute bottom-0 right-1/4 w-72 h-72 bg-emerald-200/30 rounded-full blur-3xl"></div>

            <header class="relative z-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 sm:py-5 flex items-center justify-between gap-3">
                    <a href="{{ route('welcome') }}" class="flex items-center gap-3 min-w-0">
                        <x-application-logo class="w-10 h-10 sm:w-11 sm:h-11 rounded-xl shadow-md shrink-0" />
                        <span class="text-lg sm:text-xl font-extrabold text-gray-900 truncate">{{ config('app.name', 'POS UMKM') }}</span>
                    </a>

                    <nav class="hidden md:flex items-center gap-1">
                        <a href="{{ route('welcome') }}#fitur" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 transition-colors">{{ __('Fitur') }}</a>
                    </nav>

                    <div class="flex items-center gap-2 sm:gap-3">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center px-3 sm:px-4 py-2 rounded-xl text-sm font-semibold {{ request()->routeIs('login') ? 'text-indigo-700 bg-indigo-50' : 'text-gray-700 hover:bg-gray-100' }} transition-colors touch-btn">
                                {{ __('Masuk') }}
                            </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center px-3 sm:px-4 py-2 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-violet-600 shadow-md shadow-indigo-200 hover:shadow-lg hover:from-indigo-500 hover:to-violet-500 active:scale-95 transition-all touch-btn">
                                <span class="hidden sm:inline">{{ __('Daftar Gratis') }}</span>
                                <span class="sm:hidden">{{ __('Daftar') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </header>

            <main class="relative z-10">
                {{ $slot }}
            </main>

            <footer class="relative z-10 text-center text-xs text-gray-400 py-8 px-4 border-t border-gray-100 mt-8">
                &copy; {{ date('Y') }} {{ config('app.name', 'POS UMKM') }}. {{ __('All rights reserved.') }}
            </footer>
        </div>
    </body>
</html>
