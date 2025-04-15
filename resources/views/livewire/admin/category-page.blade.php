<div>
    <x-slot:navigation></x-slot:navigation>

    <div class="max-w-7xl mx-4 py-5 sm:px-6 md:mx-auto lg:px-8">
        {{-- Header Categories --}}
        <x-slot name="header">
            {{-- breadcrumbs --}}
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="/dashboard" wire:navigate>Dashboard</a></li>
                    <li>Categories</li>
                </ul>
            </div>

            <div class="flex justify-between items-center">
                <h1 class=" text-black font-extrabold text-3xl">
                    Categories
                </h1>
                <a wire:navigate href="{{ route('form.category.create') }}" class="btn btn-warning rounded-xl">Create</a>
            </div>
        </x-slot>

        {{-- table list Categories --}}
        <x-table :headers="['name','slug','action']">
            @foreach ($categories as $category)
                <tr wire:key='{{ $category->id }}'>
                    <td x-data="{
                        idItem: {{$category->id}},
                        isChecked: function () {
                            return selectedItems.includes(this.idItem)
                        }
                    }">
                        <label>
                            <input
                            type="checkbox"
                            class="checkbox"
                            value="{{ $category->id }}"
                            x-bind:checked="isChecked()"
                            x-model.number="selectedItems"
                            x-init="productIds.push(idItem);"
                            x-on:change="console.log(selectedItems); selectAll = selectAll ? false : false;"/>
                        </label>
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('form.category.update', $category->slug) }}" class="btn btn-xs btn-warning">update</a>
                        <button type="button" class="btn btn-xs btn-error" wire:click="delete({{ $category->id }})">delete</button>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </div>
</div>
