<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <span>Manajemen Staff</span>
            <a href="{{ route('staff.create') }}"
                class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-teal-500 to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-teal-200/50 hover:from-teal-600 hover:to-emerald-700 active:scale-95 transition-all duration-200 touch-btn gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Staff
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        {{-- Mobile Cards --}}
        <div class="sm:hidden space-y-3">
            @forelse ($staff as $s)
                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-4">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-3 min-w-0 flex-1">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-100 to-emerald-100 flex items-center justify-center shadow-sm shrink-0">
                                <span class="text-sm font-bold text-teal-600">{{ strtoupper(substr($s->name, 0, 1)) }}</span>
                            </div>
                            <div class="min-w-0">
                                <h4 class="font-bold text-gray-800 truncate">{{ $s->name }}</h4>
                                <p class="text-xs text-gray-500 truncate">{{ $s->email }}</p>
                                @if ($s->phone)
                                    <p class="text-xs text-gray-400">{{ $s->phone }}</p>
                                @endif
                            </div>
                        </div>
                        <span class="ml-2 shrink-0 inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $s->is_active ? 'bg-gradient-to-r from-emerald-500 to-green-500 text-white' : 'bg-gradient-to-r from-gray-400 to-gray-500 text-white' }}">
                            {{ $s->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    <div class="flex gap-2 mt-3 pt-3 border-t border-gray-100">
                        <a href="{{ route('staff.edit', $s) }}"
                            class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-teal-600 bg-teal-50 hover:bg-teal-100 active:scale-95 transition-all duration-200 touch-btn">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit
                        </a>
                        <form method="POST" action="{{ route('staff.destroy', $s) }}" class="flex-1"
                            onsubmit="return confirm('Yakin ingin menghapus staff {{ $s->name }}?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 active:scale-95 transition-all duration-200 touch-btn">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-8 text-center">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-100 to-emerald-100 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada staff</p>
                    <a href="{{ route('staff.create') }}"
                        class="mt-4 inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-teal-500 to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-teal-200/50 active:scale-95 transition-all duration-200 touch-btn gap-2 text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Staff
                    </a>
                </div>
            @endforelse
        </div>

        {{-- Desktop Table --}}
        <div class="hidden sm:block bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-teal-50/80 to-emerald-50/80">
                            <th class="text-left px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Nama</th>
                            <th class="text-left px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Email</th>
                            <th class="text-left px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider hidden md:table-cell">Telepon</th>
                            <th class="text-left px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Status</th>
                            <th class="text-right px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($staff as $s)
                            <tr class="hover:bg-teal-50/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-teal-100 to-emerald-100 flex items-center justify-center shadow-sm">
                                            <span class="text-sm font-bold text-teal-600">{{ strtoupper(substr($s->name, 0, 1)) }}</span>
                                        </div>
                                        <span class="font-bold text-gray-800">{{ $s->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $s->email }}</td>
                                <td class="px-6 py-4 text-gray-500 hidden md:table-cell">{{ $s->phone ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $s->is_active ? 'bg-gradient-to-r from-emerald-500 to-green-500 text-white shadow-sm' : 'bg-gradient-to-r from-gray-400 to-gray-500 text-white shadow-sm' }}">
                                        {{ $s->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('staff.edit', $s) }}"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-teal-50 text-teal-600 hover:bg-teal-100 active:scale-95 transition-all duration-200 touch-btn">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('staff.destroy', $s) }}" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus staff {{ $s->name }}?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 active:scale-95 transition-all duration-200 touch-btn">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-100 to-emerald-100 flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada staff</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
