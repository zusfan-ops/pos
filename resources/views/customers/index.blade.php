<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <span>Pelanggan</span>
            <a href="{{ route('customers.create') }}"
                class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-pink-500 to-rose-600 text-white font-bold rounded-xl shadow-lg shadow-pink-200/50 hover:from-pink-600 hover:to-rose-700 active:scale-95 transition-all duration-200 touch-btn gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span class="hidden sm:inline">Tambah Pelanggan</span>
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        {{-- Desktop Table --}}
        <div class="hidden sm:block bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-pink-50/80 to-rose-50/80">
                            <th class="text-left px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Nama</th>
                            <th class="text-left px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Email</th>
                            <th class="text-left px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Telepon</th>
                            <th class="text-left px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider hidden xl:table-cell">Alamat</th>
                            <th class="text-right px-6 py-3.5 font-bold text-gray-600 text-xs uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($customers as $customer)
                            <tr class="hover:bg-pink-50/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-pink-100 to-rose-100 flex items-center justify-center shadow-sm">
                                            <span class="text-sm font-bold text-pink-600">{{ strtoupper(substr($customer->name, 0, 1)) }}</span>
                                        </div>
                                        <span class="font-bold text-gray-800">{{ $customer->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $customer->email ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                        {{ $customer->phone ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-xs hidden xl:table-cell max-w-[200px] truncate">{{ $customer->address ?? '-' }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('customers.edit', $customer) }}"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 hover:bg-indigo-100 active:scale-95 transition-all duration-200 touch-btn">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('customers.destroy', $customer) }}" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus pelanggan {{ $customer->name }}?')">
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
                                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-pink-100 to-rose-100 flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada pelanggan</p>
                                        <p class="text-gray-400 text-sm mt-1">Tambahkan pelanggan pertama Anda</p>
                                        <a href="{{ route('customers.create') }}"
                                            class="mt-4 inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-pink-500 to-rose-600 text-white font-bold rounded-xl shadow-lg shadow-pink-200/50 hover:from-pink-600 hover:to-rose-700 active:scale-95 transition-all duration-200 touch-btn gap-2 text-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                            Tambah Pelanggan
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($customers->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $customers->links() }}
                </div>
            @endif
        </div>

        {{-- Mobile Cards --}}
        <div class="sm:hidden space-y-3">
            @forelse ($customers as $customer)
                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-4">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3 min-w-0 flex-1">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-pink-100 to-rose-100 flex items-center justify-center shadow-sm shrink-0">
                                <span class="text-sm font-bold text-pink-600">{{ strtoupper(substr($customer->name, 0, 1)) }}</span>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-gray-800 truncate">{{ $customer->name }}</h3>
                                <p class="text-xs text-gray-500 truncate">{{ $customer->email ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 ml-2 shrink-0">
                            <a href="{{ route('customers.edit', $customer) }}"
                                class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 hover:bg-indigo-100 active:scale-95 transition-all duration-200 touch-btn inline-flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('customers.destroy', $customer) }}"
                                onsubmit="return confirm('Yakin ingin menghapus pelanggan {{ $customer->name }}?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="w-9 h-9 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 active:scale-95 transition-all duration-200 touch-btn inline-flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <div class="flex items-center gap-1.5 text-gray-500">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            {{ $customer->phone ?? '-' }}
                        </div>
                        <div>
                            <span class="text-xs text-gray-400">Alamat</span>
                            <p class="text-gray-700 truncate">{{ $customer->address ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-8 text-center">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-pink-100 to-rose-100 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada pelanggan</p>
                    <a href="{{ route('customers.create') }}"
                        class="mt-4 inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-pink-500 to-rose-600 text-white font-bold rounded-xl shadow-lg shadow-pink-200/50 active:scale-95 transition-all duration-200 touch-btn gap-2 text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Pelanggan
                    </a>
                </div>
            @endforelse
            @if ($customers->hasPages())
                <div class="pt-2">{{ $customers->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
