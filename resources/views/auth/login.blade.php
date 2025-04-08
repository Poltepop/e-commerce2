<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-10">
        <h1 class=" font-extrabold text-xl mb-3 font-poppins">Login</h1>
        <p class="font-poppins">Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-col items-center space-y-4">
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

        <div class="divider text-gray-400 my-10">or Signin with Email</div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full" 
                          type="email" 
                          name="email" 
                          value="admin@gmail.com" 
                          required 
                          autofocus 
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input   id="password" 
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            value="12345678"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex mt-4 justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-6">

            <x-normal-button class=" bg-blue-950 text-white font-poppins font-bold">
                {{ __('Log in') }}
            </x-normal-button>
        </div>
    </form>
</x-guest-layout>
