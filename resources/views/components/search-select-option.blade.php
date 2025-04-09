@props(['disabled' => false, 'width' => 'w-full', 'data' => [], 'nodata' => 'no category'])

{{--

format $data must be array like this :
[
    'phone',
    'laptop',
    'food',
    'drink'
]

--}}

<div class="{{ $width }} relative"
    x-data="{
                classOnFocus: 'border-gray-300',
                isOpen: false,
                itemLastHover: 0,
                itemSelected: $wire.entangle('selectedCategory')
            }"
    x-on:click.outside="isOpen = false; classOnFocus = 'border-gray-300';">

    <div class="w-full flex justify-center items-center px-1 border-2 rounded-lg"
        x-on:click="classOnFocus = 'border-orange-400'; isOpen = true;"
        :class="classOnFocus">
        <div class="py-2 w-full">
            <div class="flex flex-wrap w-full pb-2 gap-2" x-show="itemSelected.length > 0">
                <template x-for="(item, index) in itemSelected" :key="item.id">
                    <div class="flex bg-orange-200 text-sm px-2 py-0 border-[1px] bg-opacity-45 text-orange-400 border-orange-300 rounded-md cursor-pointer gap-x-1 items-center justify-between">
                        <div
                            class="text-sm"
                            x-text="item.content">
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-500" x-on:click="itemSelected.splice(index, 1);">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                </template>
            </div>
            <div class="w-full flex items-center">
                <input
                    @disabled($disabled)
                    {{ $attributes->merge(['class' => 'border-0 focus:border-0 py-0 focus:ring-0 rounded-xl shadow-sm w-full cursor-pointer']) }}>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
    </div>
    <div class="w-full bg-gray-200 rounded-lg my-1 p-1 max-h-[15em] overflow-y-auto absolute"
        x-show="isOpen">

        @forelse ($data as $key => $item)
        <span
            x-data="{
                idItem: {{$key}},
                isSelected() {
                    if(itemSelected) {
                        return itemSelected.some(i => i.id === this.idItem);
                    } else {
                        itemSelected = [];
                        return false;
                    }
                },
                toggleSelected() {
                    if(this.isSelected()) return; // prevent duplicate
                    itemSelected.push({ id: this.idItem, content: '{{$item}}' });
                }
            }"
            x-show="!isSelected()"
            class="block p-1 w-full rounded-md text-[.8em] cursor-pointer px-2"
            :class="itemLastHover === idItem ? 'bg-gray-100' : 'bg-gray-200'"
            x-on:click="
                classOnFocus = 'border-orange-200';
                toggleSelected();
            "
            x-on:mouseover="itemLastHover = {{$key}}"
            wire:key="{{$key}}"
            >
            {{ $item }}
        </span>

        @empty

            <span class="block w-full rounded-md text-[.8em] px-2">{{ $nodata }}</span>
        @endforelse

    </div>
</div>
