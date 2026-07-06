<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
            <x-text-input id="password" class="block mt-1.5 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition-all duration-200 hover:shadow-xl hover:shadow-indigo-500/40 active:scale-[0.98]">
                {{ __('Masuk') }}
            </button>
        </div>

        @if (Route::has('password.request'))
            <div class="text-center mt-4">
                <a class="text-sm text-gray-500 hover:text-indigo-600 underline" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            </div>
        @endif
    </form>

    @if (Route::has('register'))
        <p class="mt-6 text-center text-sm text-gray-500 border-t border-gray-100 pt-5">
            {{ __('Belum punya akun?') }}
            <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:text-indigo-800 underline">
                {{ __('Daftar sekarang') }}
            </a>
        </p>
    @endif
</x-guest-layout>
