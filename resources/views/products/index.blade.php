@section('title', 'Produk')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <span>Produk</span>
            <span class="text-sm font-normal text-white/80">{{ $products->total() }} produk</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <form method="GET" action="{{ route('products.index') }}" class="mb-4">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari produk..."
                    class="w-full pl-10 pr-4 py-3 border-2 border-indigo-100 rounded-xl shadow-sm focus:border-indigo-400 focus:ring-indigo-400 text-sm bg-white/80 backdrop-blur">
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </form>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 lg:gap-5">
            @forelse ($products as $product)
                <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:shadow-indigo-100/50 hover:border-indigo-200 transition-all duration-300">
                    <div class="aspect-[4/3] bg-gradient-to-br from-indigo-50 via-white to-purple-50 relative overflow-hidden">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                                    <span class="text-3xl font-extrabold text-indigo-400">{{ strtoupper(substr($product->name, 0, 1)) }}</span>
                                </div>
                            </div>
                        @endif
                        @if ($product->stock <= 0)
                            <div class="absolute top-2 right-2 bg-gradient-to-r from-red-500 to-rose-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-lg">
                                Habis
                            </div>
                        @elseif ($product->stock <= 5)
                            <div class="absolute top-2 right-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-lg">
                                Stok Min
                            </div>
                        @endif
                        <div class="absolute top-2 left-2">
                            <span class="inline-block px-2 py-0.5 rounded-lg text-[10px] font-bold bg-white/90 backdrop-blur text-indigo-600 shadow-sm">
                                @if ($product->category)
                                    {{ $product->category->name }}
                                @else
                                    Umum
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="p-3 sm:p-4">
                        <h3 class="font-bold text-gray-800 text-sm sm:text-base leading-tight truncate">{{ $product->name }}</h3>
                        <p class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 font-extrabold text-base sm:text-lg mt-1">Rp {{ number_format($product->selling_price, 0, ',', '.') }}</p>
                        <div class="flex items-center justify-between mt-2 pt-2 border-t border-gray-100">
                            <span class="text-xs sm:text-sm text-gray-500">
                                Stok: <strong class="text-gray-700">{{ $product->stock }}</strong> {{ $product->unit }}
                            </span>
                            <a href="{{ route('products.edit', $product) }}"
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-50 to-purple-50 text-indigo-600 hover:from-indigo-600 hover:to-purple-600 hover:text-white flex items-center justify-center transition-all duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16">
                    <div class="w-20 h-20 rounded-3xl bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg font-medium">Belum ada produk</p>
                    <p class="text-gray-400 text-sm mt-1">Tambahkan produk pertama Anda</p>
                    <a href="{{ route('products.create') }}"
                        class="mt-4 inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl text-sm font-bold shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 transition-all duration-200 touch-btn">
                        <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Produk
                    </a>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>

    <a href="{{ route('products.create') }}"
        class="fixed bottom-24 right-6 z-40 w-14 h-14 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full shadow-lg shadow-indigo-300 flex items-center justify-center hover:shadow-xl hover:shadow-indigo-400 active:scale-95 transition-all duration-200 touch-btn sm:bottom-8 sm:right-8 sm:z-50">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
    </a>
</x-app-layout>
