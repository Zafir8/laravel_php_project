<x-app-layout>
    <div class="flex items-center justify-center bg-gray-100 my-10">
        <div class="w-full max-w-md p-6 bg-white shadow-md rounded-lg">

            <img src="{{ asset('images/Shiftme logo.png') }}" alt="Custom Logo" class="mx-auto h-16 w-auto">

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mb-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mb-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mb-4">
                    <x-label for="role" value="{{ __('Role') }}" />
                    <select id="role" name="role" class="block w-full mt-1" required>
                        <option value="">{{ __('Select Role') }}</option>
                        <option value="2">{{ __('Parent') }}</option>
                        <option value="3">{{ __('Student') }}</option>
                        <option value="4">{{ __('Driver') }}</option>
                    </select>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ms-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
