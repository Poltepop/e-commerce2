@props(['selectedImage' => []])

<div class="flex items-center space-x-4">
    <label for="file-upload" class="py-10 px-6 border border-gray-300 rounded-xl w-full text-center cursor-pointer">
        @if (count($selectedImage) > 0)
        <div class="self-start w-full">
            <div class="text-wrap py-2 flex gap-1 flex-wrap items-center justify-center w-full overflow-auto no-scroll">
                @foreach ($selectedImage as $no => $image )
                <x-layout.admin.card class="w-full border-none flex p-0 justify-between gap-2 items-start">
                    <img src="{{ $image->temporaryUrl() }}" alt="" class="w-full max-w-4xl rounded-lg z-0 relative">

                    <div class="flex justify-between absolute items-center gap-2 md:m-5">
                        <button type="button" wire:click="deleteImageSelected({{ $loop->index }})" class="text-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>    
                        </button>
                        <span class="d-inline-block text-nowrap text-[.5em] md:text-[.8em] text-white">{{ $image->getClientOriginalName()}}</span>
                    </div>
                </x-layout.admin.card>
                        
                @endforeach
            </div>
            <button type="button" wire:click="resetImages()" class=" text-orange-500 hover:text-orange-700 cursor-pointer font-bold">Cancel</button>
        </div>
        @else
            Drag & drop your files or
            <span class=" text-orange-400 hover:text-orange-700 cursor-pointer">Browse</span>
      @endif
    </label>

    

    <input
        id="file-upload"
        type="file"
        class="hidden"
        {{ $attributes->only('multiple') }}
        {{ $attributes->whereStartsWith('wire') }} >
</div>
