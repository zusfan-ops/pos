@section('title', 'Tambah Produk')

<x-app-layout>
    <x-slot name="header">
        <span>Tambah Produk</span>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-4 sm:p-6 lg:p-8">
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Produk Baru</h3>
                    <p class="text-sm text-gray-500">Lengkapi detail produk di bawah ini</p>
                </div>
            </div>

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <x-input-label for="name" value="Nama Produk" />
                    <x-text-input id="name" name="name" type="text" class="mt-1.5 block w-full" placeholder="Masukkan nama produk" value="{{ old('name') }}" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="category_id" value="Kategori" />
                    <select id="category_id" name="category_id"
                        class="mt-1.5 block w-full border-2 border-indigo-200 focus:border-indigo-400 focus:ring-indigo-400 rounded-xl shadow-sm bg-white/80 backdrop-blur p-3 text-sm">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-1" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="purchase_price" value="Harga Beli" />
                        <x-text-input id="purchase_price" name="purchase_price" type="number" step="0.01" class="mt-1.5 block w-full" placeholder="0" value="{{ old('purchase_price') }}" />
                        <x-input-error :messages="$errors->get('purchase_price')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="selling_price" value="Harga Jual" />
                        <x-text-input id="selling_price" name="selling_price" type="number" step="0.01" class="mt-1.5 block w-full" placeholder="0" value="{{ old('selling_price') }}" required />
                        <x-input-error :messages="$errors->get('selling_price')" class="mt-1" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="stock" value="Stok" />
                        <x-text-input id="stock" name="stock" type="number" class="mt-1.5 block w-full" placeholder="0" value="{{ old('stock') }}" required />
                        <x-input-error :messages="$errors->get('stock')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="unit" value="Satuan" />
                        <x-text-input id="unit" name="unit" type="text" class="mt-1.5 block w-full" placeholder="Contoh: pcs, kg, liter" value="{{ old('unit') }}" required />
                        <x-input-error :messages="$errors->get('unit')" class="mt-1" />
                    </div>
                </div>

                <div>
                    <x-input-label for="image" value="Gambar Produk" />
                    <input id="image" name="image" type="file"
                        class="mt-1.5 block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-2 file:border-indigo-200 file:text-sm file:font-bold file:text-indigo-600 file:bg-indigo-50 hover:file:bg-indigo-100 file:cursor-pointer cursor-pointer file:transition-all" />
                    <x-input-error :messages="$errors->get('image')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="description" value="Deskripsi (opsional)" />
                    <textarea id="description" name="description" rows="3"
                        class="mt-1.5 block w-full border-2 border-indigo-200 focus:border-indigo-400 focus:ring-indigo-400 rounded-xl shadow-sm bg-white/80 backdrop-blur p-3 text-sm"
                        placeholder="Deskripsi produk">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-1" />
                </div>

                <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                    <x-primary-button class="w-full sm:w-auto touch-btn">
                        <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Simpan Produk
                    </x-primary-button>
                    <a href="{{ route('products.index') }}"
                        class="w-full sm:w-auto text-center px-5 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl font-bold text-xs text-gray-600 hover:bg-gray-200 active:scale-95 transition-all duration-150 touch-btn">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
