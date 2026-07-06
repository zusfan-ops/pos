<x-app-layout>
    <x-slot name="header">
        <span>Edit Pelanggan</span>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-4 sm:p-8">
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Edit Data Pelanggan</h3>
                    <p class="text-sm text-gray-500">Perbarui informasi pelanggan</p>
                </div>
            </div>

            <form method="POST" action="{{ route('customers.update', $customer) }}" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <x-input-label for="name" value="Nama" />
                    <x-text-input id="name" name="name" type="text" class="mt-1.5 block w-full" :value="old('name', $customer->name)" required autofocus placeholder="Masukkan nama pelanggan" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" name="email" type="email" class="mt-1.5 block w-full" :value="old('email', $customer->email)" placeholder="contoh@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="phone" value="Telepon" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1.5 block w-full" :value="old('phone', $customer->phone)" placeholder="08xxxxxxxxxx" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address" value="Alamat" />
                    <textarea id="address" name="address" rows="3"
                        class="mt-1.5 block w-full border-2 border-indigo-200 focus:border-indigo-400 focus:ring-indigo-400 rounded-xl shadow-sm bg-white/80 backdrop-blur"
                        placeholder="Alamat lengkap">{{ old('address', $customer->address) }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                    <x-primary-button class="w-full sm:w-auto touch-btn">
                        <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Perbarui
                    </x-primary-button>
                    <a href="{{ route('customers.index') }}"
                        class="w-full sm:w-auto text-center px-5 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl font-bold text-xs text-gray-600 hover:bg-gray-200 active:scale-95 transition-all duration-150 touch-btn">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
