<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#4f46e5">
    <link rel="manifest" href="/manifest.json">
    <title>{{ config('app.name', 'POS UMKM') }} - @yield('title', 'Dashboard')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .touch-btn { min-height: 48px; min-width: 48px; }
        .touch-card { cursor: pointer; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        @media (max-width: 640px) {
            .main-content { padding-bottom: 80px; }
            .mobile-bottom-nav { position: fixed; bottom: 0; left: 0; right: 0; z-index: 50; }
        }
        @media (min-width: 641px) and (max-width: 1023px) {
            .sidebar-icon-only { width: 72px; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div x-data="{ sidebarOpen: false, mobileNavOpen: false }" class="min-h-screen flex">
        @include('layouts.navigation')

        <div class="flex-1 flex flex-col main-content">
            @isset($header)
                <header class="bg-white shadow-sm border-b border-gray-200 lg:sticky lg:top-0 z-40">
                    <div class="px-4 sm:px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 touch-btn">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                                </button>
                                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">{{ $header }}</h2>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="hidden sm:inline text-sm text-gray-500">{{ Auth::user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 rounded-lg hover:bg-gray-100 touch-btn text-gray-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>
            @endisset

            <main class="flex-1 p-3 sm:p-4 lg:p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-r-lg text-sm sm:text-base" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-r-lg text-sm sm:text-base" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                {{ $slot }}
            </main>

            <footer class="hidden sm:block text-center text-xs text-gray-400 py-4">
                &copy; {{ date('Y') }} {{ config('app.name', 'POS UMKM') }}. All rights reserved.
            </footer>
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
