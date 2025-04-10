<x-app-layout>
    <x-slot name="header">
        <h1 class=" text-black font-extrabold text-3xl">
            Dashboard
        </h1>
    </x-slot>

    <div class="">
        <div class="max-w-7xl md:mx-auto ">
            <x-card class=" text-black flex justify-between items-center">
                {{-- Avatar --}}
                <div class="flex">
                    <div class="avatar">
                        <div class="w-14 rounded-full">
                            <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                        </div>
                    </div>
                    
                    <div class="flex flex-col ml-4">
                        <h1 class="font-extrabold text-lg">Welcome</h1>
                        <h2 class="font-thin">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <x-normal-button class="rounded-sm w-36 hidden md:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                        
                        <h5>Sign Out</h5>
                    </x-normal-button>
                </form>

            </x-card>

            <div class="flex mt-5">
                <x-card class="w-full text-black mr-5 flex-col">
                    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing.</h1>
                    <h2 class="font-extrabold text-4xl">700</h2>
                </x-card>
                <x-card class="w-full text-black flex-col">
                    <h1 class="">Lorem ipsum dolor sit amet consectetur adipisicing.</h1>
                    <h2 class=" font-extrabold text-4xl">12</h2>
                </x-card>
            </div>
            <x-card class="w-full text-black h-80 mt-5 justify-center items-center">
                Content
            </x-card>
        </div>
    </div>
</x-app-layout>
