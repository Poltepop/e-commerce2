<div x-data="{ open: true }" {{ $attributes->merge([
    'class' => 'bg-white rounded-xl shadow'
    ]) }}>

    <button 
      @click="open = !open" 
      type="button"
      class="w-full flex justify-between text-left font-bold hover:underline p-4">
      {{ $header }}

      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 transition duration-300 " :class="open ? 'size-5' : ' rotate-180' ">
        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
      </svg>
      
    </button>

    <div 
      x-show="open" 
      x-transition 
      class="mt-2 text-gray-700 border-t p-4">
      {{ $slot }}
    </div>
</div>