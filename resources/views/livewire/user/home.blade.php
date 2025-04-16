<div>
    <x-user.title/>
    
    <div class="mx-2 md:mx-10">
        {{-- navigation --}}
        <x-user.navigation/>
        {{-- Banner --}}
        <div class="mb-5 lg:mb-10">
            <img src="{{ asset('storage/img/banner.jpg') }}" alt="" class="w-full rounded-lg object-cover min-h-40 max-h-80 md:rounded-2xl">
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
         <div class="grid grid-cols-2 lg:grid-cols-3 mb-10 justify-items-stretch items-center"> 
            {{-- col 1 --}}
            <h1 class="font-bold text-xl lg:row-start-1 col-start-1">Featured products</h1>

            {{-- col 2 --}}
            <div class="flex p-1 text-white items-center justify-between justify-self-center rounded-full gap-5 bg-blue-950 lg:row-start-1 lg:col-span-1 lg:col-start-2 row-start-2 col-span-2 w-full lg:min-w-[30em]">
                <span class="bg-white rounded-full py-1 px-4 text-sm font-bold text-black md:px-8 text-nowrap">show All</span>
                <span class="font-bold px-1 md:px-8 text-nowrap">last Pieces</span>
                <span class="font-bold px-1 md:px-8 text-nowrap">Spelcial Price</span>
            </div>

            {{-- col 3 --}}
            <span class=" justify-self-end lg:col-start-3  row-start-1 col-start-2">See All</span>
        </div>   

        {{-- card Featured products --}}
        <div class="flex items-start justify-evenly gap-2 overflow-x-auto rounded-xl">
            @foreach (range(1,5) as $index)
            <x-.card-variant-one class="md:max-w-64 md:min-w-64">
                
            </x-.card-variant-one>
            @endforeach
        </div>
    </div>
    <img src="/storage/img/bg.png" alt="" class="w-full mt-10">
</div>