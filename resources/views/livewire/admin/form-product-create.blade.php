<div>
    <form action="" wire:submit="create" method="post">
        <div class="flex gap-2 flex-col lg:flex-row lg:gap-7">
            {{-- left --}}
            <div class="flex-auto flex gap-y-2 lg:gap-7 flex-col">
                <x-layout.admin.card class="w-full flex-col">
                    {{-- Row 1 --}}
                    <div class="flex w-full gap-4 mb-6">
                        {{-- Product name --}}
                        <div class="w-full">
                            <x-input-label for="Name" :value="__('Name')"/>
                            <x-text-input id="Name"
                                        class="block mt-1 w-full focus:border-orange-500 focus:ring-orange-500"
                                        type="text"
                                        name="name"
                                        wire:model.live.debounce.3500ms="productRequest.name"
                                        :value="old('name')"
                                        autofocus
                                        autocomplete="name" />
                            <x-input-error :messages="$errors->get('productRequest.name')" class="mt-2" />
                        </div>

                        {{-- Slug --}}
                        <div class="w-full">
                            <x-input-label for="Slug" :value="__('Slug')"/>
                            <x-text-input id="Slug"
                                        class="block mt-1 w-full bg-gray-100"
                                        type="text"
                                        name="slug"
                                        wire:model='slug'
                                        required
                                        autofocus
                                        autocomplete="slug"
                                        disabled/>
                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>
                    </div>

                    {{-- Row 2 --}}
                    <div class="flex w-full gap-4">
                        {{-- Description --}}
                        <div class="w-full">
                            <x-input-label for="Description" :value="__('Description')"/>
                            <x-text-area  id="Description"
                                        class="block mt-1 w-full focus:border-orange-500 focus:ring-orange-500"
                                        type="text"
                                        name="description"
                                        wire:model="productRequest.description"
                                        :value="old('description')"
                                        autofocus
                                        autocomplete="description">
                                            {{-- Value --}}
                                        </x-text-area>
                            <x-input-error :messages="$errors->get('productRequest.description')" class="mt-2" />
                        </div>

                        {{-- short description --}}
                        <div class="w-full">
                            <x-input-label for="Description_short" :value="__('Short Description')"/>
                            <x-text-area  id="Description_short"
                                        class="block mt-1 w-full focus:border-orange-500 focus:ring-orange-500"
                                        type="text"
                                        name="short_description"
                                        wire:model="productRequest.short_description"
                                        :value="old('short_description')"
                                        autofocus
                                        autocomplete="short_description">
                                        </x-text-area>
                            <x-input-error :messages="$errors->get('productRequest.short_description')" class="mt-2" />
                        </div>
                    </div>
                </x-layout.admin.card>

            {{-- Image --}}
            <x-collapse class="w-full">
                    <x-slot:header>
                        Image
                    </x-slot:header>

                    <x-input-file
                        multiple
                        wire:model.live.debounce.4000ms='productRequest.images'
                        :selectedImage="$selectedImage" />
                    <x-input-error
                        :messages="$errors->get('productRequest.images')"
                        class="mt-2" />
            </x-collapse>

            {{-- variant --}}
            <x-collapse>
                    <x-slot:header>
                        Variant
                    </x-slot:header>

                    {{-- Price --}}
                    <div class="flex w-full gap-4 mb-4">
                        <div class="w-full">
                            <x-input-label for="Price" :value="__('Price')"/>
                            <x-text-input  id="Price"
                            class="block mt-1 w-full focus:border-orange-500 focus:ring-orange-500"
                            type="text"
                            name="price"
                            wire:model="productRequest.price"
                            :value="old('price')"
                            autofocus
                            autocomplete="price">
                        </x-text-input>
                        <x-input-error :messages="$errors->get('productRequest.price')" class="mt-2" />
                        </div>

                        {{-- Weight --}}
                        <div class="w-full">
                            <x-input-label for="Weight" :value="__('Weight')"/>
                            <x-text-input  id="Weight"
                            class="block mt-1 w-full  focus:border-orange-500 focus:ring-orange-500"
                            type="text"
                            name="weight"
                            wire:model="productRequest.weight"
                            :value="old('weight')"
                            autofocus
                            autocomplete="weight">
                        </x-text-input>
                        <x-input-error :messages="$errors->get('productRequest.weight')" class="mt-2" />
                        </div>
                    </div>

                    {{-- Quantity --}}
                    <div class="flex w-full gap-4">
                        <div class="w-full">
                            <x-input-label for="Qty" :value="__('Quantity')"/>
                            <x-text-input  id="Qty"
                            class="block mt-1 w-full focus:border-orange-500 focus:ring-orange-500"
                            type="text"
                            name="qty"
                            :value="old('qty')"
                            autofocus
                            autocomplete="qty">
                        </x-text-input>
                        <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                        </div>
                    </div>
            </x-collapse>

            </div>

            {{-- right --}}
            <div class="flex-auto flex w-full lg:max-w-xs gap-y-2 lg:gap-7 flex-col">
                {{-- Row 1 Right --}}
                <x-collapse class="w-full">
                    {{-- header card --}}
                    <x-slot:header>
                        Status
                    </x-slot:header>

                    {{-- visible menu toggle --}}
                    <div class="flex">
                        <x-toggle color="orange" id="Visible"/>
                        <x-input-label class="ml-2 font-bold" for="Visible">
                            Visible
                        </x-input-label>
                    </div>
                    <div class="mt-1">
                        <p class=" text-gray-500 text-sm">This product will be hidden from all sales channels.</p>
                    </div>

                    {{-- date menu --}}
                    <div class="flex flex-col mt-4 gap-1">
                        <x-input-label class="ml-1" for="Date">
                            Availability<span class="text-red-500">*</span>
                        </x-input-label>

                        <x-input-date class="w-full focus:border-orange-500 focus:ring-orange-500" id="Date"/>
                    </div>
                </x-collapse>

                {{-- Row 2 Right --}}
                <x-collapse class="w-full">
                    {{-- header card --}}
                    <x-slot:header>
                        Associations
                    </x-slot:header>

                    <div class="flex flex-col gap-4">

                        {{-- brand  --}}
                        <div class="flex flex-col gap-1">
                            <x-input-label class="ml-1" for="Brand">
                                Brand
                            </x-input-label>

                            <x-input-select id="Brand" class="focus:border-orange-500 focus:ring-orange-500">
                                <option value="">Brand 1</option>
                                <option value="">Brand 2</option>
                                <option value="">Brand 3</option>
                            </x-input-select>
                        </div>

                    {{-- Category --}}
                    <div class="flex flex-col gap-1">
                        <x-input-label class="ml-1" for="Category">
                            Category<span class="text-red-500">*</span>
                        </x-input-label>

                        <x-search-select-option
                            wire:model.live.debounce.200ms='inputCategory'
                            id="Category"
                            :data="$categories"
                            placeholder="no options match your search"
                            nodata="No option match your search"
                            width="w-full"/>
                    </div>
                </div>
                </x-collapse>
            </div>
        </div>

        <div class="flex mt-2 lg:mt-7 gap-2">
            <button class="btn btn-warning rounded-xl" type="submit">Create</button>
            <a href="{{ route('admin.products') }}" class="btn rounded-xl">Cancel</a>
        </div>
    </form>
</div>
