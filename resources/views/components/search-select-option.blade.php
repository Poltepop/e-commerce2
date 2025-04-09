@props(['disabled' => false, 'width' => 'w-full', 'data' => [], 'nodata' => 'no options match your search'])

{{--

format $data must be array like this :
[
    ['id' => 1, 'name'=> 'joko1'] note: every item index 0 must be an id and index 1 its content
    ['id' => 2, 'name'=> 'joko2']
    ['id' => 3, 'name'=> 'joko3']
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

    <div class="w-full flex justify-center items-center pr-2 border border-gray-300 rounded-xl"
        x-on:click="classOnFocus = 'border-orange-400 border-2';"
        :class="classOnFocus">
        <div class="py-1 w-full">
            <div class="flex flex-wrap w-full pl-1 gap-1" x-show="itemSelected.length > 0">
                <template x-for="(item, index) in itemSelected" :key="item.id">
                    <div class="flex bg-orange-100 text-xs px-2 py-0 border-[1px] bg-opacity-45 text-orange-500 border-orange-300 rounded-md cursor-pointer gap-x-1 items-center justify-between">
                        <div
                            class="text-sm"
                            x-text="item.name">
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
                    x-on:click="isOpen = true"
                    {{ $attributes->merge(['class' => 'border-0 focus:border-0 py-1 focus:ring-0 rounded-xl w-full cursor-pointer text-sm']) }}>

                <button type="button" class="" x-on:click="isOpen = !isOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 transition duration-300 " :class="isOpen ? 'rotate-180' : 'size-4' ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
    <x-layout.admin.card class="px-1 py-1 gap-1 w-full flex-col rounded-xs border-gray-200 z-50 absolute max-h-52 overflow-y-auto mt-1" x-show="isOpen">
        @forelse ($data as $item)
        @php
            $content = array_values($item);
        @endphp
        <span
            x-data="{
                idItem: {{$content[0]}},
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
                    itemSelected.push({ id: this.idItem, name: '{{$content[1]}}' });
                }
            }"
            x-show="!isSelected()"
            class="block p-1 w-full rounded-md cursor-pointer text-sm  px-2"
            :class="itemLastHover === idItem ? 'bg-gray-100' : 'bg-white'"
            x-on:click="
                classOnFocus = 'border-orange-200';
                toggleSelected();
            "
            x-on:mouseover="itemLastHover = {{$content[0]}}"
            wire:key="{{$item['id']}}"
            >
            {{ $content[1] }}
        </span>

        @empty
            <span class="block w-full p-2 text-sm text-gray-500">{{ $nodata }}</span>
        @endforelse
    </x-layout.admin.card>
</div>
