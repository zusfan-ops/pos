<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Staff</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end mb-6">
                <a href="{{ route('staff.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition touch-btn">
                    + Tambah Staff
                </a>
            </div>

            {{-- Mobile: Cards --}}
            <div class="sm:hidden space-y-3">
                @forelse ($staff as $s)
                    <div class="bg-white rounded-lg shadow p-4">
                        <div class="flex items-start justify-between">
                            <div class="min-w-0 flex-1">
                                <h4 class="font-semibold text-gray-900 truncate">{{ $s->name }}</h4>
                                <p class="text-sm text-gray-500 truncate">{{ $s->email }}</p>
                                @if ($s->phone)
                                    <p class="text-sm text-gray-500 truncate">{{ $s->phone }}</p>
                                @endif
                            </div>
                            <span class="ml-2 shrink-0 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $s->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $s->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="flex gap-2 mt-3 pt-3 border-t border-gray-100">
                            <a href="{{ route('staff.edit', $s) }}"
                                class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition touch-manipulation">Edit</a>
                            <form method="POST" action="{{ route('staff.destroy', $s) }}" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus staff ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="text-sm text-red-600 hover:text-red-800 font-medium transition touch-manipulation">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 py-8">Belum ada staff.</p>
                @endforelse
            </div>

            {{-- Desktop: Table --}}
            <div class="hidden sm:block bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($staff as $s)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $s->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $s->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $s->phone ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $s->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $s->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('staff.edit', $s) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <form method="POST" action="{{ route('staff.destroy', $s) }}" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus staff ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada staff.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
