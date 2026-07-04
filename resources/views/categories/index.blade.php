<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kategori</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Kategori</h3>
                <form method="POST" action="{{ route('categories.store') }}" class="flex flex-col sm:flex-row gap-3">
                    @csrf
                    <input type="text" name="name" placeholder="Nama kategori" required
                        class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                        Simpan
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col" x-data="{ editing: false, name: '{{ $category->name }}' }">
                        <template x-if="!editing">
                            <div class="flex-1 flex flex-col">
                                <h4 class="font-semibold text-gray-900 text-sm truncate" x-text="name"></h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $category->products_count }} produk</p>
                                <div class="flex gap-2 mt-3 pt-3 border-t border-gray-100">
                                    <button @click="editing = true"
                                        class="text-xs text-indigo-600 hover:text-indigo-800 font-medium transition touch-manipulation">
                                        Edit
                                    </button>
                                    <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="text-xs text-red-600 hover:text-red-800 font-medium transition touch-manipulation">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </template>

                        <template x-if="editing">
                            <div class="flex-1 flex flex-col">
                                <form method="POST" action="{{ route('categories.update', $category) }}" class="flex flex-col gap-2">
                                    @csrf @method('PUT')
                                    <input type="text" x-model="name" name="name" required
                                        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                    <div class="flex gap-2">
                                        <button type="submit"
                                            class="flex-1 inline-flex justify-center items-center px-3 py-1.5 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition touch-manipulation">
                                            Simpan
                                        </button>
                                        <button type="button" @click="editing = false; name = '{{ $category->name }}'"
                                            class="flex-1 inline-flex justify-center items-center px-3 py-1.5 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 transition touch-manipulation">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </template>
                    </div>
                @endforeach
            </div>

            @if ($categories->isEmpty())
                <p class="text-center text-gray-500 mt-8">Belum ada kategori.</p>
            @endif
        </div>
    </div>
</x-app-layout>
