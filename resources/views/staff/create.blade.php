<x-app-layout>
    <x-slot name="header">
        <span>Tambah Staff</span>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg border border-white/70 p-4 sm:p-8">
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-500 to-emerald-600 flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Staff Baru</h3>
                    <p class="text-sm text-gray-500">Buat akun staff untuk membantu operasional</p>
                </div>
            </div>

            <form method="POST" action="{{ route('staff.store') }}" class="space-y-5">
                @csrf

                <div>
                    <x-input-label for="name" value="Nama" />
                    <x-text-input id="name" name="name" type="text" class="mt-1.5 block w-full" :value="old('name')" required autofocus placeholder="Masukkan nama staff" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" name="email" type="email" class="mt-1.5 block w-full" :value="old('email')" required placeholder="contoh@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" name="password" type="password" class="mt-1.5 block w-full" required autocomplete="new-password" placeholder="Min. 8 karakter" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1.5 block w-full" required placeholder="Ulangi password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <x-input-label for="phone" value="Telepon (opsional)" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1.5 block w-full" :value="old('phone')" placeholder="08xxxxxxxxxx" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                    <x-primary-button class="w-full sm:w-auto touch-btn">
                        <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Simpan
                    </x-primary-button>
                    <a href="{{ route('staff.index') }}"
                        class="w-full sm:w-auto text-center px-5 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl font-bold text-xs text-gray-600 hover:bg-gray-200 active:scale-95 transition-all duration-150 touch-btn">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
