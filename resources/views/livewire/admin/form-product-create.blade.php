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
                                        class="block mt-1 w-full"
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
                                        class="block mt-1 w-full"
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
                                        class="block mt-1 w-full"
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

            <x-collapse>
                    <x-slot:header>
                        Variant
                    </x-slot:header>

                    <div class="flex w-full gap-4 mb-4">
                        <div class="w-full">
                            <x-input-label for="Price" :value="__('Price')"/>
                            <x-text-input  id="Price"
                            class="block mt-1 w-full"
                            type="text"
                            name="price"
                            wire:model="productRequest.price"
                            :value="old('price')"
                            autofocus
                            autocomplete="price">
                        </x-text-input>
                        <x-input-error :messages="$errors->get('productRequest.price')" class="mt-2" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="Weight" :value="__('Weight')"/>
                            <x-text-input  id="Weight"
                            class="block mt-1 w-full"
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

                    <div class="flex w-full gap-4">
                        <div class="w-full">
                            <x-input-label for="Qty" :value="__('Quantity')"/>
                            <x-text-input  id="Qty"
                            class="block mt-1 w-full"
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
            <div class="flex-auto w-full lg:max-w-xs">
                {{-- Row 1 Right --}}
                <x-collapse class="w-full">
                    {{-- header card --}}
                    <x-slot:header>
                        Status
                    </x-slot:header>

                    {{-- visible menu toggle --}}
                    <div class="flex">
                        <x-toggle color="orange"/>                     
                        <h5 class="ml-2 font-bold">Visible</h5>
                    </div>
                    <div class="mt-1">
                        <p class=" text-gray-500 text-sm">This product will be hidden from all sales channels.</p>
                    </div>

                    {{-- date menu --}}
                    <div class="flex flex-col mt-4 gap-1">
                        <h5 class="ml-2 font-bold">Availability<span class="text-red-500">*</span></h5>
                        <x-input-date class="w-full"/>
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
