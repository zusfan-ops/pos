<x-landing-layout>
    <div class="min-h-[70vh] flex items-center justify-center px-4 py-10 sm:py-16">
        <div class="w-full max-w-md">
            <div class="text-center mb-6">
                <x-application-logo class="w-14 h-14 rounded-2xl shadow-lg mx-auto mb-4" />
                <h1 class="text-xl font-bold text-gray-900">{{ __('Masuk ke Toko Anda') }}</h1>
                <p class="text-sm text-gray-500 mt-1">{{ __('Kelola kasir, stok, dan laporan bisnis Anda.') }}</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-6">
                        <x-primary-button class="w-full justify-center">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-center mt-4">
                            <a class="text-sm text-gray-500 hover:text-gray-800 underline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif
                </form>

                @if (Route::has('register'))
                    <p class="mt-6 text-center text-sm text-gray-600 border-t border-gray-100 pt-5">
                        {{ __('Belum punya bisnis?') }}
                        <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-800 underline">
                            {{ __('Daftar sekarang') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-landing-layout>
