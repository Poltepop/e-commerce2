
<div {{ $attributes->merge(['class' => 'rounded-xl bg-white/60 w-full max-w-44 min-w-44 md:max-w-72 md:min-w-72 p-3']) }}>
    <div>
        <div class="flex justify-between items-start relative p-2">
            <span class="text-">Lorem ipsum</span>
            <div class="flex flex-col absolute items-end right-0 w-full mr-2">
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 md:size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 md:size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                </svg>
                
                
            </div>
            
        </div>
        
        <div class="flex items-center justify-center mt-3">
            <img src="{{ asset('storage/img/card.jpg') }}" alt="" class="h-28 w-28 md:h-44 md:w-40">
        </div>
    <div class="mt-2 flex flex-col gap-1 p-2">
    <p class="text-xs">Lorem ipsum dolor sit amet.</p>
    <div class="rating rating-xs">
        <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" />
        <input
          type="radio"
          name="rating-5"
          class="mask mask-star-2 bg-orange-400"
          checked="checked" />
          <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" />
          <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" />
          <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" />
    </div>
        <span class="text-xs">Rp150.000,00</span>
    </div>
</div>
</div>