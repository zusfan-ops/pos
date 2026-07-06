<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#4f46e5">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" type="image/svg+xml" href="/icons/icon.svg">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <title>{{ config('app.name', 'POS UMKM') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .touch-btn { min-height: 44px; }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 pb-6 px-4 bg-gradient-to-br from-indigo-900 via-purple-900 to-indigo-950 relative overflow-hidden">
        <div class="pointer-events-none absolute -top-40 -left-40 w-[500px] h-[500px] bg-indigo-500/20 rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-purple-500/20 rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-rose-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 w-full max-w-md">
            <div class="text-center mb-6">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center mx-auto shadow-2xl shadow-indigo-500/30 mb-4">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M13 3a9 9 0 00-9 9H1l3.89 3.89.07.14A9.98 9.98 0 013 13.5C3 8.26 7.26 4 12.5 4S22 8.26 22 13.5 17.74 23 12.5 23c-2.03 0-3.92-.6-5.5-1.64l-1.45 1.45A10.96 10.96 0 0012.5 25C18.85 25 24 19.85 24 13.5S18.85 2 13 2zm-1 5v6l5.25 3.15.75-1.23-4.5-2.67V8H12z"/></svg>
                </div>
                <h1 class="text-2xl font-extrabold text-white">POS UMKM</h1>
                <p class="text-indigo-200/80 text-sm mt-1">Aplikasi Kasir Gratis untuk Usaha Anda</p>
            </div>

            <div class="bg-white/95 backdrop-blur rounded-2xl shadow-2xl border border-white/20 p-6 sm:p-8">
                {{ $slot }}
            </div>

            <p class="text-center text-indigo-300/60 text-xs mt-6">100% Gratis Selamanya &mdash; Dibangun untuk UMKM Indonesia</p>
        </div>
    </div>
</body>
</html>
