<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />



      

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4">
                     <x-jet-nav-link style="color: white;" href="{{ url('/login') }}" :active="request()->routeIs('/login')">
                        {{ __('Login') }}
                    </x-jet-nav-link>
                </x-jet-button>
                <x-jet-button class="ml-4">
                    <x-jet-nav-link style="color: white;" href="{{ url('/register') }}" :active="request()->routeIs('/register')">
                        {{ __('Register') }}
                    </x-jet-nav-link>
                </x-jet-button>
            </div>
           

                    

   
    </x-jet-authentication-card>
</x-guest-layout>


