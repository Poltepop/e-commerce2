@props(['selectedImage' => []])

<div class="flex items-center space-x-4">
    <label for="file-upload" class="p-10 border border-gray-300 rounded-xl w-full text-center cursor-pointer">
        @if (count($selectedImage) > 0)
        <div class="self-start w-full">
            <cite class="font-bold text-gray-700 text-[.7em] md:text-[.9em] text-nowrap">selected: </cite>
            <div class="text-wrap py-2 flex flex-wrap items-center justify-center w-full overflow-auto no-scroll">
                @foreach ($selectedImage as $no => $image )
                <div class="flex items-center">
                    <span class="d-inline-block text-nowrap text-[.5em] md:text-[.8em] text-gray-400">{{ $image->getClientOriginalName() . '--' }}</span>
                    <img src="{{ $image->temporaryUrl() }}" alt="" class="w-[50px] h-[30px] rounded-lg">
                    <span>{{ ", " }}</span>
                </div>
                @endforeach
            </div>
            <button type="button"
                    wire:click="resetImages()"
                    class=" text-orange-500 hover:text-orange-700 cursor-pointer">Cancel</button>
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
