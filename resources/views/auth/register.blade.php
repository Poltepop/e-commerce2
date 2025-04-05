<x-guest-layout>

    <div class="text-center mb-10">
        <h1 class=" font-extrabold text-xl mb-3 font-poppins">Create an account</h1>
        <p class="font-poppins">Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex flex-col items-center space-y-4 mb-10">
            <!-- Tombol Google -->
            <x-normal-button disabeld>
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo" class="w-5 h-5 mr-2">
                <span>Login with Google</span>
            </x-normal-button>
          
            <!-- Tombol Facebook -->   
            <x-normal-button disabeld>
                <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook Logo" class="w-5 h-5 mr-2">
                <span>Login with Facebook</span>
            </x-normal-button>
        </div>

        <!-- first Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')"/>
            <x-text-input id="first_name" 
                          class="block mt-1 w-full" 
                          type="text" 
                          name="first_name" 
                          :value="old('name')" 
                          required 
                          autofocus 
                          autocomplete="name" 
                          placeholder="Enter your name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_nanme" 
                          class="block mt-1 w-full" 
                          type="text" name="last_name" 
                          :value="old('name')" 
                          required 
                          autofocus 
                          autocomplete="name" 
                          placeholder="Enter your name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" 
                          class="block mt-1 w-full" 
                          type="email" 
                          placeholder="Enter your email" 
                          name="email" 
                          :value="old('email')" 
                          required 
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="********" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="********" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-10">
            <x-normal-button class="bg-blue-950 text-white font-poppins font-bold">
                {{ __('Register') }}
            </x-normal-button>

            <a href="{{ route('login') }}" class="text-gray-400 font-bold text-sm mt-2">been here before?<span class="text-black"> Login</span></a>
        </div>
    </form>
</x-guest-layout>
