
<div {{ $attributes->merge(['class' => 'rounded-xl bg-white w-full max-w-44 min-w-44 md:max-w-56 md:min-w-56']) }} x-data="{open: false}">
    <div  @click="open = ! open">
        <div class="flex justify-between items-start relative p-2">
            <span class="text-xs">Lorem ipsum</span>
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
            <img src="{{ asset('storage/img/card.jpg') }}" alt="" class=" rounded h-28 w-28 md:h-40 md:w-36">
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
    <div class="p-3 bg-blue-900 rounded-b-xl w-full flex justify-center items-center gap-2 text-sm" x-show="open"">
        <span class="text-white">Add to Cart</span>
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.73709 12.1842C1.02389 9.33145 0.667289 7.90588 1.41623 6.94664C2.16434 5.9874 3.63562 5.9874 6.5757 5.9874H10.4243C13.3652 5.9874 14.8348 5.9874 15.5838 6.94664C16.3327 7.90505 15.9761 9.33228 15.2629 12.1842C14.8091 13.9988 14.583 14.9057 13.9063 15.4344C13.2297 15.9622 12.2946 15.9622 10.4243 15.9622H6.5757C4.70542 15.9622 3.77028 15.9622 3.09366 15.4344C2.41703 14.9057 2.19011 13.9988 1.73709 12.1842Z" stroke="#F4F4F4" stroke-width="1.5"/>
            <path d="M14.7342 6.40302L14.1441 4.23766C13.9163 3.40227 13.8024 2.98499 13.5689 2.66995C13.336 2.35696 13.0197 2.11585 12.6562 1.97421C12.2904 1.83124 11.8582 1.83124 10.9937 1.83124M2.26575 6.40302L2.85592 4.23766C3.08368 3.40227 3.19756 2.98499 3.43114 2.66995C3.66403 2.35696 3.98032 2.11585 4.34383 1.97421C4.70957 1.83124 5.14181 1.83124 6.0063 1.83124" stroke="#F4F4F4" stroke-width="1.5"/>
            <path d="M6.00635 1.83123C6.00635 1.61078 6.09392 1.39935 6.24981 1.24346C6.4057 1.08758 6.61712 1 6.83758 1H10.1625C10.383 1 10.5944 1.08758 10.7503 1.24346C10.9062 1.39935 10.9937 1.61078 10.9937 1.83123C10.9937 2.05169 10.9062 2.26312 10.7503 2.419C10.5944 2.57489 10.383 2.66247 10.1625 2.66247H6.83758C6.61712 2.66247 6.4057 2.57489 6.24981 2.419C6.09392 2.26312 6.00635 2.05169 6.00635 1.83123Z" stroke="#F4F4F4" stroke-width="1.5"/>
        </svg>     
    </div>
</div>