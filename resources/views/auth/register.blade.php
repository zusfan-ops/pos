<x-landing-layout>
    <div class="min-h-[70vh] flex items-center justify-center px-4 py-10 sm:py-16">
        <div class="w-full max-w-md">
            <div class="text-center mb-6">
                <x-application-logo class="w-14 h-14 rounded-2xl shadow-lg mx-auto mb-4" />
                <h1 class="text-xl font-bold text-gray-900">{{ __('Daftarkan Bisnis Anda') }}</h1>
                <p class="text-sm text-gray-500 mt-1">{{ __('Setiap akun mengelola tokonya sendiri secara terpisah.') }}</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Nama Bisnis -->
                    <div class="mt-4">
                        <x-input-label for="business_name" :value="__('Nama Bisnis')" />
                        <x-text-input id="business_name" class="block mt-1 w-full" type="text" name="business_name" :value="old('business_name')" required autocomplete="business_name" />
                        <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-primary-button class="w-full justify-center">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>

                <p class="mt-6 text-center text-sm text-gray-600 border-t border-gray-100 pt-5">
                    {{ __('Sudah punya akun?') }}
                    <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-800 underline">
                        {{ __('Masuk di sini') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-landing-layout>
