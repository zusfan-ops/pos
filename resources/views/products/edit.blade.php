@section('title', 'Edit Produk')

<x-app-layout>
    <x-slot name="header">
        Edit Produk
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8">
            @csrf
            @method('PATCH')

            <div class="space-y-5">
                <div>
                    <x-input-label for="name" value="Nama Produk" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full p-3" placeholder="Masukkan nama produk" value="{{ old('name', $product->name) }}" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="category_id" value="Kategori" />
                    <select id="category_id" name="category_id"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-3">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-1" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="purchase_price" value="Harga Beli" />
                        <x-text-input id="purchase_price" name="purchase_price" type="number" step="0.01" class="mt-1 block w-full p-3" placeholder="0" value="{{ old('purchase_price', $product->purchase_price) }}" />
                        <x-input-error :messages="$errors->get('purchase_price')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="selling_price" value="Harga Jual" />
                        <x-text-input id="selling_price" name="selling_price" type="number" step="0.01" class="mt-1 block w-full p-3" placeholder="0" value="{{ old('selling_price', $product->selling_price) }}" required />
                        <x-input-error :messages="$errors->get('selling_price')" class="mt-1" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="stock" value="Stok" />
                        <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full p-3" placeholder="0" value="{{ old('stock', $product->stock) }}" required />
                        <x-input-error :messages="$errors->get('stock')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="unit" value="Satuan" />
                        <x-text-input id="unit" name="unit" type="text" class="mt-1 block w-full p-3" placeholder="Contoh: pcs, kg, liter" value="{{ old('unit', $product->unit) }}" required />
                        <x-input-error :messages="$errors->get('unit')" class="mt-1" />
                    </div>
                </div>

                @if ($product->image)
                    <div>
                        <x-input-label value="Gambar Saat Ini" />
                        <div class="mt-2 flex items-center gap-3">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-20 h-20 object-cover rounded-lg border border-gray-200">
                            <span class="text-sm text-gray-500">{{ $product->image }}</span>
                        </div>
                    </div>
                @endif

                <div>
                    <x-input-label for="image" value="Ganti Gambar" />
                    <input id="image" name="image" type="file"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 file:cursor-pointer cursor-pointer" />
                    <x-input-error :messages="$errors->get('image')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="description" value="Deskripsi" />
                    <textarea id="description" name="description" rows="4"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-3 text-sm"
                        placeholder="Deskripsi produk (opsional)">{{ old('description', $product->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-1" />
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <x-primary-button class="w-full sm:w-auto justify-center py-3 text-sm touch-btn">
                        Update Produk
                    </x-primary-button>
                    <a href="{{ route('products.index') }}"
                        class="w-full sm:w-auto text-center px-4 py-3 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 touch-btn">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
