@section('title', 'Produk')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <span>Produk</span>
            <span class="text-sm font-normal text-gray-500">{{ $products->total() }} produk</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <form method="GET" action="{{ route('products.index') }}" class="mb-4">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari produk..."
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 lg:gap-5">
            @forelse ($products as $product)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-200">
                    <div class="aspect-[4/3] bg-gray-100 relative overflow-hidden">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        @if ($product->stock <= 0)
                            <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-lg">
                                Habis
                            </div>
                        @elseif ($product->stock <= 5)
                            <div class="absolute top-2 right-2 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded-lg">
                                Stok Minim
                            </div>
                        @endif
                    </div>

                    <div class="p-3 sm:p-4">
                        <h3 class="font-semibold text-gray-900 text-sm sm:text-base leading-tight truncate">{{ $product->name }}</h3>
                        @if ($product->category)
                            <p class="text-xs sm:text-sm text-gray-500 mt-1">{{ $product->category->name }}</p>
                        @endif
                        <p class="text-indigo-600 font-bold text-sm sm:text-base mt-2">Rp {{ number_format($product->selling_price, 0, ',', '.') }}</p>
                        <div class="flex items-center justify-between mt-2 pt-2 border-t border-gray-100">
                            <span class="text-xs sm:text-sm text-gray-600">
                                Stok: <strong>{{ $product->stock }}</strong> {{ $product->unit }}
                            </span>
                            <a href="{{ route('products.edit', $product) }}"
                                class="text-indigo-600 hover:text-indigo-800 p-2 touch-btn inline-flex items-center justify-center rounded-lg hover:bg-indigo-50 transition-colors">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16 text-gray-400">
                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <p class="text-lg font-medium">Belum ada produk</p>
                    <p class="text-sm mt-1">Tambahkan produk pertama Anda</p>
                    <a href="{{ route('products.create') }}"
                        class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 touch-btn">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-indigo-600 text-white rounded-full shadow-lg flex items-center justify-center hover:bg-indigo-700 active:bg-indigo-800 transition-colors touch-btn sm:bottom-8 sm:right-8">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
    </a>
</x-app-layout>
