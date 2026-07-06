<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#4f46e5">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" type="image/svg+xml" href="/icons/icon.svg">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <title>{{ config('app.name', 'POS UMKM') }} - @yield('title', 'Dashboard')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .touch-btn { min-height: 48px; min-width: 48px; }
        .touch-card { cursor: pointer; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .text-shadow { text-shadow: 0 1px 3px rgba(0,0,0,0.15); }
        @media (max-width: 640px) {
            .main-content { padding-bottom: 80px; }
            .mobile-bottom-nav { position: fixed; bottom: 0; left: 0; right: 0; z-index: 50; }
        }
        @media (min-width: 641px) and (max-width: 1023px) {
            .sidebar-icon-only { width: 80px; }
        }
        @media (min-width: 640px) and (max-width: 1023px) {
            .main-content { padding-left: 80px; }
        }
        @media (min-width: 1024px) {
            .main-content { padding-left: 16rem; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-indigo-100 via-purple-50 to-rose-100/80">
    <div x-data="{ sidebarOpen: false, mobileNavOpen: false }" class="min-h-screen flex">
        @include('layouts.navigation')

        <div class="flex-1 flex flex-col main-content">
            @isset($header)
                <header class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 shadow-lg lg:sticky lg:top-0 z-40">
                    <div class="px-4 sm:px-6 py-3 lg:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg hover:bg-white/20 touch-btn text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                                </button>
                                <h2 class="text-lg sm:text-xl font-bold text-white text-shadow">{{ $header }}</h2>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="hidden sm:inline text-sm text-white/80 font-medium">{{ Auth::user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 rounded-lg hover:bg-white/20 touch-btn text-white/80 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </header>
            @endisset

            <main class="flex-1 p-3 sm:p-4 lg:p-6">
                @if(session('success'))
                    <div class="mb-4 bg-emerald-50 border-2 border-emerald-400 text-emerald-800 px-4 py-3 rounded-xl text-sm sm:text-base flex items-center gap-3 shadow-sm" role="alert">
                        <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 bg-red-50 border-2 border-red-400 text-red-800 px-4 py-3 rounded-xl text-sm sm:text-base flex items-center gap-3 shadow-sm" role="alert">
                        <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="font-medium">{{ session('error') }}</p>
                    </div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('scripts')
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                    console.log('ServiceWorker registered');
                }, function(err) {
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
</body>
</html>
