<x-app-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <div class="flex items-center justify-center h-screen">
            <a href="{{route('github.redirect')}}" class="bg-gray-900 text-white rounded-lg py-2 px-4 flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M8 .25A7.745 7.745 0 00.25 8c0 3.405 2.21 6.304 5.272 7.338.385.07.524-.166.524-.37 0-.182-.007-.67-.01-1.315-2.137.464-2.586-1.033-2.586-1.033-.349-.887-.852-1.123-.852-1.123-.697-.477.053-.468.053-.468.772.054 1.177.794 1.177.794.684 1.17 1.794.832 2.23.635.07-.497.267-.833.485-1.025-1.697-.192-3.476-.848-3.476-3.767 0-.832.297-1.51.785-2.04-.083-.193-.34-.966.07-2.013 0 0 .64-.204 2.1.778A7.35 7.35 0 018 3.51c.63.002 1.267.085 1.867.25 1.46-.982 2.098-.776 2.098-.776.41 1.047.154 1.82.077 2.012.487.53.784 1.209.784 2.04 0 2.925-1.784 3.573-3.485 3.76.275.235.52.7.52 1.41 0 1.018-.01 1.838-.01 2.088 0 .204.14.44.53.368C13.793 14.302 16 11.405 16 8A7.75 7.75 0 008 .25"></path>
                </svg>
                <span>Register with GitHub</span>
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
