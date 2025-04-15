<div>
    <x-slot:navigation></x-slot:navigation>
    <div class="max-w-7xl mx-4 py-5 sm:px-6 md:mx-auto lg:px-8">
        {{-- Header form category create --}}
        <x-slot name="header">
            {{-- breadcrumbs --}}
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="{{ route('admin.categories') }}">Categories</a></li>
                    <li>Form Update Categories</li>
                </ul>
            </div>
    
            <div class="flex justify-between items-center">
                <h1 class=" text-black font-extrabold text-3xl">
                    Category Update
                </h1>
            </div>
        </x-slot>
        
        <form wire:submit.prevent="update">
            <x-card class="flex-col gap-5">
                <div class="flex w-full gap-5">

                    {{-- form input name --}}
                    <div class="w-full">
                        <x-input-label for="Name" :value="__('Name')"/>
                        <x-text-input id="Name"
                        class="block mt-1 w-full focus:border-orange-500 focus:ring-orange-500"
                        wire:model.live.debounce.1000ms="categoryRequest.name"
                        type="text"
                        name="name"
                        autofocus />
                        <x-input-error :messages="$errors->get('categoryRequest.name')" class="mt-2" />
                    </div>

                    {{-- form input slug --}}
                    <div class="w-full">
                        <x-input-label for="Slug" :value="__('Slug')"/>
                        <x-text-input id="Slug"
                        class="block mt-1 w-full bg-gray-100 focus:border-orange-500 focus:ring-orange-500"
                        wire:model="categoryRequest.slug"
                        type="text"
                        name="slug"
                        autofocus
                        disabled />
                    </div>

                </div>

                <div class="w-full">
                    <div class="w-full">
                        <x-input-label for="Parent" :value="__('Parent')"/>
                        <x-text-input id="Slug"
                        class="block mt-1 w-full bg-gray-100 focus:border-orange-500 focus:ring-orange-500"
                        type="text"
                        name="name"
                        autofocus
                        disabled />
                    </div>
                </div>

                <div class="flex w-full gap-2">
                    <input type="checkbox" class="toggle toggle-warning" />
                    <span class="font-bold">Visible to customers.</span>
                </div>

                <div class="w-full">
                    <x-input-label for="Descrition" :value="__('Description')"/>
                    <x-text-area class="w-full h-40  focus:border-orange-500 focus:ring-orange-500"
                                 for="description"
                                 disabled=""
                    ></x-text-area>
                </div>

            </x-card>

            <div class="flex mt-2 lg:mt-7 gap-2">
                <button class="btn btn-warning rounded-xl" type="submit">update</button>
                <a href="{{ route('admin.categories') }}"
                    class="btn rounded-xl"
                    wire:navigate>Cancel</a>
            </div>

        </form>
    </div>
</div>
