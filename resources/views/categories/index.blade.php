<x-app-layout>
    <x-slot name="header">
        <span>Kategori</span>
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-4 sm:p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Tambah Kategori Baru</h3>
            </div>
            <form method="POST" action="{{ route('categories.store') }}" class="flex flex-col sm:flex-row gap-3">
                @csrf
                <div class="flex-1 relative">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <input type="text" name="name" placeholder="Nama kategori..." required
                        class="w-full pl-11 pr-4 py-3 border-2 border-indigo-100 rounded-xl shadow-sm focus:border-indigo-400 focus:ring-indigo-400 text-sm bg-white/80">
                </div>
                <button type="submit"
                    class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-orange-500 to-amber-600 text-white font-bold rounded-xl shadow-lg shadow-orange-200/50 hover:from-orange-600 hover:to-amber-700 active:scale-95 transition-all duration-200 touch-btn gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Simpan
                </button>
            </form>
        </div>

        @if ($categories->isNotEmpty())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                    @php
                        $gradients = ['from-violet-500 to-purple-600', 'from-emerald-500 to-green-600', 'from-blue-500 to-cyan-600', 'from-rose-500 to-pink-600', 'from-amber-500 to-orange-600', 'from-teal-500 to-emerald-600', 'from-indigo-500 to-blue-600', 'from-fuchsia-500 to-pink-600'];
                        $g = $gradients[$loop->index % count($gradients)];
                    @endphp
                    <div class="group bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 overflow-hidden hover:shadow-xl transition-all duration-300" x-data="{ editing: false, name: '{{ $category->name }}' }">
                        <div class="h-2 bg-gradient-to-r {{ $g }}"></div>
                        <div class="p-4">
                            <template x-if="!editing">
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $g }} flex items-center justify-center shadow-md shrink-0">
                                            <span class="text-base font-bold text-white">{{ strtoupper(substr($category->name, 0, 1)) }}</span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <h4 class="font-bold text-gray-800 text-sm truncate" x-text="name"></h4>
                                            <p class="text-xs text-gray-500 font-medium">{{ $category->products_count }} produk</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 mt-3 pt-3 border-t border-gray-100">
                                        <button @click="editing = true"
                                            class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 active:scale-95 transition-all duration-200 touch-btn">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            Edit
                                        </button>
                                        <form method="POST" action="{{ route('categories.destroy', $category) }}" class="flex-1"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori {{ $category->name }}?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="w-full inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 active:scale-95 transition-all duration-200 touch-btn">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </template>
                            <template x-if="editing">
                                <div>
                                    <form method="POST" action="{{ route('categories.update', $category) }}" class="space-y-3">
                                        @csrf @method('PUT')
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $g }} flex items-center justify-center shadow-md shrink-0">
                                                <span class="text-base font-bold text-white">{{ strtoupper(substr($category->name, 0, 1)) }}</span>
                                            </div>
                                            <div class="flex-1">
                                                <label class="block text-xs font-bold text-gray-600 mb-1">Nama Kategori</label>
                                                <input type="text" x-model="name" name="name" required
                                                    class="w-full px-3 py-2 border-2 border-indigo-200 rounded-xl text-sm focus:border-indigo-400 focus:ring-indigo-400">
                                            </div>
                                        </div>
                                        <div class="flex gap-2 pt-1">
                                            <button type="submit"
                                                class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r {{ $g }} active:scale-95 transition-all duration-200 touch-btn shadow-md">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                Simpan
                                            </button>
                                            <button type="button" @click="editing = false; name = '{{ $category->name }}'"
                                                class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 active:scale-95 transition-all duration-200 touch-btn">
                                                Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </template>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-12 text-center">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-orange-100 to-amber-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
                <p class="text-gray-500 text-lg font-medium">Belum ada kategori</p>
                <p class="text-gray-400 text-sm mt-1">Buat kategori pertama untuk produk Anda</p>
            </div>
        @endif
    </div>
</x-app-layout>
