<x-app-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <div class="flex items-center justify-center h-screen">
            <a href="{{route('provider.redirect', 'github')}}" class="bg-gray-900 text-white rounded-lg py-2 px-4 flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M8 .25A7.745 7.745 0 00.25 8c0 3.405 2.21 6.304 5.272 7.338.385.07.524-.166.524-.37 0-.182-.007-.67-.01-1.315-2.137.464-2.586-1.033-2.586-1.033-.349-.887-.852-1.123-.852-1.123-.697-.477.053-.468.053-.468.772.054 1.177.794 1.177.794.684 1.17 1.794.832 2.23.635.07-.497.267-.833.485-1.025-1.697-.192-3.476-.848-3.476-3.767 0-.832.297-1.51.785-2.04-.083-.193-.34-.966.07-2.013 0 0 .64-.204 2.1.778A7.35 7.35 0 018 3.51c.63.002 1.267.085 1.867.25 1.46-.982 2.098-.776 2.098-.776.41 1.047.154 1.82.077 2.012.487.53.784 1.209.784 2.04 0 2.925-1.784 3.573-3.485 3.76.275.235.52.7.52 1.41 0 1.018-.01 1.838-.01 2.088 0 .204.14.44.53.368C13.793 14.302 16 11.405 16 8A7.75 7.75 0 008 .25"></path>
                </svg>
                <span>Register with GitHub</span>
            </a>
        </div>
        <div class="flex items-center justify-center h-screen">
            <a href="{{ route('provider.redirect', 'facebook') }}" class="bg-blue-700 text-white rounded-lg py-2 px-4 flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 2H2C1.45 2 1 2.45 1 3v10c0 .55.45 1 1 1h6V9h-2V7h2V5.5C7 4.12 8.12 3 9.5 3H12v2H9.5c-.28 0-.5.22-.5.5V7h3l-.5 2h-2v6h4c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1z"></path>
                </svg>
                <span>Register with Facebook</span>
            </a>
        </div>
        <div class="flex items-center justify-center h-screen">
            <a href="{{ route('provider.redirect', 'google') }}" class="bg-red-700 text-white rounded-lg py-2 px-4 flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 1.042C5.78 1.042.712 5.76.712 11.99c0 4.354 2.752 8.063 6.598 9.458-.09-.804-.14-1.633-.14-2.474 0-3.774 2.682-6.518 5.738-6.518 1.642 0 3.007.55 4.002 1.448a6.9 6.9 0 01-2.95 3.61c-1.057.682-2.396 1.05-4.077 1.05H8.53v-2.86h5.948c.09.542.14 1.072.14 1.573 0 3.025-2.032 5.158-5.058 5.158-3.388 0-6.083-2.75-6.083-6.16 0-.504.06-.987.198-1.45C1.772 12.602 1 10.897 1 9.03c0-2.754 2.233-4.988 4.987-4.988 1.44 0 2.586.504 3.416 1.337l2.253-2.178c-1.28-1.172-2.99-1.888-4.938-1.888-4.102 0-7.426 3.325-7.426 7.427s3.324 7.426 7.426 7.426c4.344 0 6.12-3.292 6.12-6.33 0-.432-.04-.762-.117-1.11.808-.574 1.516-1.292 2.074-2.117l-1.78-1.367z"/>
                </svg>
                <span>Register with Google</span>
            </a>
        </div>
        <div class="flex items-center justify-center h-screen text-white pt-2">
            <span>or</span>
        </div>
        <x-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autocomplete="username"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}"/>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                         name="password_confirmation" required autocomplete="new-password"/>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
