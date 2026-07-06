<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 font-semibold" />
            <x-text-input id="name" class="block mt-1.5 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Masukkan nama" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="business_name" :value="__('Nama Bisnis')" class="text-gray-700 font-semibold" />
            <x-text-input id="business_name" class="block mt-1.5 w-full" type="text" name="business_name" :value="old('business_name')" required placeholder="Masukkan nama toko/bisnis" />
            <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Masukkan email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
            <x-text-input id="password" class="block mt-1.5 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Buat password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-700 font-semibold" />
            <x-text-input id="password_confirmation" class="block mt-1.5 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition-all duration-200 hover:shadow-xl hover:shadow-indigo-500/40 active:scale-[0.98]">
                {{ __('Daftar Gratis') }}
            </button>
        </div>

        <p class="mt-6 text-center text-sm text-gray-500 border-t border-gray-100 pt-5">
            {{ __('Sudah punya akun?') }}
            <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-800 underline">
                {{ __('Masuk') }}
            </a>
        </p>
    </form>
</x-guest-layout>
