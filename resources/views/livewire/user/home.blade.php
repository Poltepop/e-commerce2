<div>
    <x-user.title/>
    
    <div class="mx-2 md:mx-16">
        {{-- navigation --}}
        <x-user.navigation/>
        {{-- Banner --}}
        <div class="mb-5 lg:mb-10">
            <img src="{{ asset('storage/img/banner.jpg') }}" alt="" class="w-full rounded-lg object-cover min-h-40 md:rounded-2xl">
        </div>

        {{-- card Items --}}
            <div class="flex items-start justify-between gap-2 overflow-x-auto rounded-xl">
                @foreach (range(1,6) as $index)
                <x-card-variant-one></x-card-variant-one>
                @endforeach
            </div>

        {{-- contact --}}
        <x-lerage-icon/>

        {{-- feature products --}}
         <div class="grid grid-cols-2 lg:grid-cols-3 mb-10 justify-items-stretch items-center gap-2"> 
            {{-- col 1 --}}
            <h1 class="font-bold text-xl lg:row-start-1 col-start-1">Featured products</h1>

            {{-- col 2 --}}
            <div class="flex p-0.5 text-white items-center justify-between justify-self-center rounded-full gap-5 bg-blue-950 lg:row-start-1 lg:col-span-1 lg:col-start-2 row-start-2 col-span-2 w-full lg:min-w-[30em]">
                <span class="bg-white rounded-full py-1 px-4 text-sm font-bold text-black md:px-8 text-nowrap">show All</span>
                <span class="font-bold px-1 md:px-8 text-nowrap">last Pieces</span>
                <span class="font-bold px-1 md:px-8 text-nowrap">Spelcial Price</span>
            </div>

            {{-- col 3 --}}
            <span class=" justify-self-end lg:col-start-3  row-start-1 col-start-2">See All</span>
        </div>   

        {{-- card Featured products --}}
        <div class="flex items-start justify-between gap-2 overflow-x-auto rounded-xl">
            @foreach (range(1,5) as $index)
            <x-.card-variant-three class="md:max-w-64 md:min-w-64">
                
            </x-.card-variant-three>
            @endforeach
        </div>
    </div>


    {{-- Best Selling products --}}
    <div class="relative w-full h-screen max-h-96 mt-16">
        <img src="/storage/img/bg.png" class="absolute inset-0 w-full h-full object-cover z-0" />
        
        <div class="relative z-10 text-white p-16 flex items-center h-full justify-between">
            <div class="flex flex-col gap-4">
                <h1 class=" text-3xl font-bold">Our</h1>
                <h1 class="text-3xl font-bold">Best Selling Products</h1>
                <span class="text-[13px]">fulfill your needs with the best products we provide</span>

                <div class="mx-auto flex gap-2 rounded-3xl py-4 px-16 mt-10 bg-blue-950">
                    <span class="text-sm font-bold text-nowrap">Exlpore now</span>
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.9" clip-path="url(#clip0_10_341)">
                        <path d="M17.9215 13.6854L20.75 10.857C20.8437 10.7632 20.8964 10.636 20.8964 10.5034C20.8964 10.3708 20.8437 10.2436 20.75 10.1499L17.9215 7.32144C17.8516 7.25129 17.7625 7.20348 17.6654 7.18407C17.5683 7.16465 17.4676 7.1745 17.3761 7.21237C17.2846 7.25024 17.2064 7.31442 17.1515 7.39678C17.0965 7.47914 17.0672 7.57597 17.0673 7.67499L17.0681 10.0035L0.59742 10.0028V11.004L17.0681 11.0033L17.0673 13.3318C17.0672 13.4309 17.0965 13.5277 17.1515 13.6101C17.2064 13.6924 17.2846 13.7566 17.3761 13.7945C17.4676 13.8323 17.5683 13.8422 17.6654 13.8228C17.7625 13.8034 17.8516 13.7555 17.9215 13.6854Z" fill="#F8F8F8"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_10_341">
                        <rect width="15" height="15" fill="white" transform="translate(10.6002) rotate(45)"/>
                        </clipPath>
                        </defs>
                    </svg>                        
                </div>
            </div>

            {{-- Card --}}
            <div class="flex gap-7">
                @foreach (range(1,3) as $index)
                <x-card-variant-two class="text-black"/>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Trending Product --}}
    <div class="mx-2 md:mx-16">
        <div class="py-10">
            <div class="flex justify-between pb-10">
                <h1 class="font-bold text-xl">Trending Product</h1>
                <h1 class="font-bold text-xl">See All</h1>
            </div>
            
            <div class="flex items-start justify-between gap-2 overflow-x-auto rounded-xl">
                @foreach (range(1,5) as $index)
                <x-.card-variant-three class="md:max-w-64 md:min-w-64">
                    
                </x-.card-variant-three>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Top Rated product --}}
    <div class="bg-blue-950">
        <div class="mx-2 md:mx-16 py-5">
            <div class="py-3">
                <h1 class="text-2xl font-bold text-white">Top Rated Product</h1>
            </div>

        <div class="flex flex-col laptop:flex-row gap-4">
            @foreach (range(1,3) as $index)
            <x-card-variant-four></x-card-variant-four>
            @endforeach
        </div> 
            
        </div>
    </div>

    <div class="p-10 bg-gray-950 text-white">
        <div class="flex justify-between items-center">

            <div class="flex gap-16  w-full items-center">
                <h1 class="font-bold text-xl text-nowrap">Sign Up Newsletter</h1>

                <label for="" class="border p-1 h-10 w-full max-w-3xl flex justify-between rounded-lg">
                    <input type="text" class=" w-full h-7 bg-transparent border-none focus:outline-none focus:ring-0 placeholder:text-white" placeholder="Your Email Addres">
                    <button class="bg-white text-black text-sm px-7 py-1 font-bold rounded-lg">Send</button>
                </label>
            </div>

            <div class="flex flex-col w-full max-w-xs pl-10">
                <h1 class="text-xl">Follow us on: </h1>
                <div class="flex">
                    {{-- Logos --}}
                </div>
            </div>


        </div>

        <div class="flex justify-evenly gap-20 mt-16">
            <div class="flex flex-col">
                <h1 class="font-bold text[17px] mb-3">Privacy And Policy</h1>
                <span class="text-[16px]">Return & Exchanges</span>
                <span class="text-[16px]">Paymeny Terms</span>
                <span class="text-[16px]">Delivery Terms</span>
                <span class="text-[16px]">Payment & pricing</span>
                <span class="text-[16px]">Terms Of use</span>
                <span class="text-[16px]">Privacy Policiy</span>
            </div>
            <div class="flex flex-col">
                <h1 class="font-bold text[17px] mb-3">Privacy And Policy</h1>
                <span class="text-[16px]">Return & Exchanges</span>
                <span class="text-[16px]">Paymeny Terms</span>
                <span class="text-[16px]">Delivery Terms</span>
                <span class="text-[16px]">Payment & pricing</span>
                <span class="text-[16px]">Terms Of use</span>
                <span class="text-[16px]">Privacy Policiy</span>
            </div>
            <div class="flex flex-col">
                <h1 class="font-bold text[17px] mb-3">Privacy And Policy</h1>
                <span class="text-[16px]">Return & Exchanges</span>
                <span class="text-[16px]">Paymeny Terms</span>
                <span class="text-[16px]">Delivery Terms</span>
                <span class="text-[16px]">Payment & pricing</span>
                <span class="text-[16px]">Terms Of use</span>
                <span class="text-[16px]">Privacy Policiy</span>
            </div>
            <div class="flex flex-col">
                <h1 class="font-bold text[17px] mb-3">Privacy And Policy</h1>
                <span class="text-[16px]">Return & Exchanges</span>
                <span class="text-[16px]">Paymeny Terms</span>
                <span class="text-[16px]">Delivery Terms</span>
                <span class="text-[16px]">Payment & pricing</span>
                <span class="text-[16px]">Terms Of use</span>
                <span class="text-[16px]">Privacy Policiy</span>
            </div>
        </div>

    </div>

</div>