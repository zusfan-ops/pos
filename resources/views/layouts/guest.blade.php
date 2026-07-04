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
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .touch-btn { min-height: 44px; }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <x-pwa-install-banner />

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 pb-6 px-4 bg-gradient-to-br from-indigo-50 via-white to-violet-50 relative overflow-hidden">
            <div class="pointer-events-none absolute -top-20 -left-20 w-72 h-72 bg-indigo-300/30 rounded-full blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-20 -right-20 w-72 h-72 bg-violet-300/30 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <a href="{{ route('login') }}">
                    <x-application-logo class="w-20 h-20 rounded-2xl shadow-lg" />
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
