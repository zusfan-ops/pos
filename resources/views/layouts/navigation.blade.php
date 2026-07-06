@php
$navItems = [
    ['route' => 'dashboard', 'name' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'color' => 'from-emerald-500 to-green-600'],
    ['route' => 'pos.index', 'name' => 'POS Kasir', 'icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z', 'color' => 'from-blue-500 to-cyan-600'],
    ['route' => 'products.index', 'name' => 'Produk', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'color' => 'from-violet-500 to-purple-600'],
    ['route' => 'categories.index', 'name' => 'Kategori', 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z', 'color' => 'from-orange-500 to-amber-600'],
    ['route' => 'customers.index', 'name' => 'Pelanggan', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'color' => 'from-pink-500 to-rose-600'],
    ['route' => 'reports.index', 'name' => 'Laporan', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'from-indigo-500 to-blue-600'],
    ['route' => 'staff.index', 'name' => 'Staff', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z', 'color' => 'from-teal-500 to-emerald-600', 'owner_only' => true],
];
@endphp

<!-- Desktop Sidebar -->
<div class="hidden lg:flex lg:flex-col lg:w-64 lg:bg-gradient-to-b lg:from-indigo-900 lg:via-indigo-950 lg:to-purple-950 lg:fixed lg:inset-y-0 lg:shadow-2xl">
    <div class="flex items-center h-16 px-6 border-b border-white/10">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center shadow-lg">
            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M13 3a9 9 0 00-9 9H1l3.89 3.89.07.14A9.98 9.98 0 013 13.5C3 8.26 7.26 4 12.5 4S22 8.26 22 13.5 17.74 23 12.5 23c-2.03 0-3.92-.6-5.5-1.64l-1.45 1.45A10.96 10.96 0 0012.5 25C18.85 25 24 19.85 24 13.5S18.85 2 13 2zm-1 5v6l5.25 3.15.75-1.23-4.5-2.67V8H12z"/></svg>
        </div>
        <span class="ml-3 text-lg font-extrabold text-white tracking-wide">{{ config('app.name', 'POS') }}</span>
    </div>
    <nav class="flex-1 px-3 py-4 space-y-1.5 overflow-y-auto">
        @foreach($navItems as $item)
            @if(isset($item['owner_only']) && !Auth::user()->isOwner()) @continue @endif
            @php $active = request()->routeIs($item['route']); @endphp
            <a href="{{ route($item['route']) }}"
               class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl transition-all duration-200 {{ $active ? 'bg-white/15 text-white shadow-lg' : 'text-indigo-200/80 hover:bg-white/10 hover:text-white' }}">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br {{ $item['color'] }} flex items-center justify-center shrink-0 shadow {{ $active ? 'ring-2 ring-white/30' : '' }}">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                </div>
                <span class="ml-3">{{ $item['name'] }}</span>
                @if($active)
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                @endif
            </a>
        @endforeach
    </nav>
    <div class="p-4 border-t border-white/10">
        <a href="{{ route('profile.edit') }}"
           class="flex items-center px-4 py-3 text-sm font-medium text-indigo-200/80 rounded-xl hover:bg-white/10 hover:text-white transition-all duration-200">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pink-400 to-rose-500 flex items-center justify-center shrink-0 shadow">
                <span class="text-xs font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
            <div class="ml-3 truncate">
                <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-indigo-300/70">{{ ucfirst(Auth::user()->role) }}</p>
            </div>
        </a>
    </div>
</div>

<!-- Mobile Bottom Navigation -->
<nav class="mobile-bottom-nav bg-white/95 backdrop-blur-lg border-t border-indigo-100 sm:hidden shadow-[0_-4px_20px_rgba(0,0,0,0.08)]">
    <div class="flex items-center justify-around h-16 safe-area-bottom">
        @foreach($navItems as $item)
            @if(isset($item['owner_only']) && !Auth::user()->isOwner()) @continue @endif
            @php $active = request()->routeIs($item['route']); @endphp
            <a href="{{ route($item['route']) }}"
               class="flex flex-col items-center justify-center px-2 py-1 relative {{ $active ? 'text-indigo-600' : 'text-gray-400' }}">
                @if($active)
                    <span class="absolute -top-0.5 w-8 h-1 rounded-full bg-gradient-to-r {{ $item['color'] }}"></span>
                @endif
                <div class="w-7 h-7 rounded-lg {{ $active ? 'bg-gradient-to-br ' . $item['color'] : '' }} flex items-center justify-center">
                    <svg class="w-5 h-5 {{ $active ? 'text-white' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                </div>
                <span class="text-[10px] mt-0.5 font-medium {{ $active ? 'text-indigo-600 font-bold' : '' }}">{{ $item['name'] }}</span>
            </a>
            @if($loop->iteration == 3) @break @endif
        @endforeach
        <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-center px-2 py-1 {{ request()->routeIs('profile.*') ? 'text-indigo-600' : 'text-gray-400' }}">
            <div class="w-7 h-7 rounded-full bg-gradient-to-br from-pink-400 to-rose-500 flex items-center justify-center">
                <span class="text-[10px] font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
            <span class="text-[10px] mt-0.5 font-medium">Akun</span>
        </a>
    </div>
</nav>

<!-- Tablet Sidebar Icons -->
<div class="hidden sm:flex lg:hidden sidebar-icon-only fixed left-0 inset-y-0 bg-gradient-to-b from-indigo-900 via-indigo-950 to-purple-950 flex-col items-center py-4 space-y-3 z-40 shadow-xl">
    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center mb-2 shadow-lg">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M13 3a9 9 0 00-9 9H1l3.89 3.89.07.14A9.98 9.98 0 013 13.5C3 8.26 7.26 4 12.5 4S22 8.26 22 13.5 17.74 23 12.5 23c-2.03 0-3.92-.6-5.5-1.64l-1.45 1.45A10.96 10.96 0 0012.5 25C18.85 25 24 19.85 24 13.5S18.85 2 13 2zm-1 5v6l5.25 3.15.75-1.23-4.5-2.67V8H12z"/></svg>
    </div>
    @foreach($navItems as $item)
        @if(isset($item['owner_only']) && !Auth::user()->isOwner()) @continue @endif
        @php $active = request()->routeIs($item['route']); @endphp
        <a href="{{ route($item['route']) }}"
           class="p-2.5 rounded-xl transition-all duration-200 {{ $active ? 'bg-white/20 shadow-lg ring-2 ring-white/20' : 'text-indigo-200/60 hover:bg-white/10 hover:text-white' }}"
           title="{{ $item['name'] }}">
            <div class="w-6 h-6 rounded-lg bg-gradient-to-br {{ $item['color'] }} flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
            </div>
        </a>
    @endforeach
</div>
