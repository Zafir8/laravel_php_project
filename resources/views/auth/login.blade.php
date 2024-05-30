<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md p-6 bg-white shadow-md rounded-lg">
            <img src="{{ asset('images/Shiftme logo.png') }}" alt="Custom Logo" class="mx-auto h-16 w-auto">

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mb-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center mb-4">
                    <x-checkbox id="remember_me" name="remember" class="text-indigo-600" />
                    <x-label for="remember_me" class="ml-2">{{ __('Remember me') }}</x-label>
                </div>

                <div class="text-center">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="mt-4 w-full">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
