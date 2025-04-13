<div>
    <x-slot:navigation></x-slot:navigation>
    <div class="py-5">
        <div class="max-w-7xl mx-4 sm:px-6 md:mx-auto lg:px-8">
            <x-slot name="header">
                {{-- breadcrumbs --}}
                <div class="breadcrumbs text-sm">
                    <ul>
                        <li><a href="/dashboard" wire:navigate>Dashboard</a></li>
                        <li>Products</li>
                    </ul>
                </div>

                <div class="flex justify-between items-center">
                    <h1 class=" text-black font-extrabold text-3xl">
                        Products
                    </h1>
                    <a href="{{ route('form.product.create') }}" class="btn btn-warning rounded-xl">Create</a>
                </div>
            </x-slot>

            {{-- Ket --}}
            <div class="mb-5 gap-4 md:gap-5 flex flex-col md:flex-row">
                {{-- total products --}}
                <x-card class="w-full flex-col px-10">
                    <h1 class=" text-gray-500">Total products</h1>
                    <h2 class="text-4xl font-bold">{{ $productQty }}</h2>
                </x-card>
                {{-- Products inventory --}}
                <x-card class="w-full flex-col px-10">
                    <h1 class=" text-gray-500">Product inventory</h1>
                    <h2 class="text-4xl font-bold">66</h2>
                </x-card>
                {{-- Avg Price --}}
                <x-card class="w-full flex-col px-10">
                    <h1 class=" text-gray-500">Average price</h1>
                    <h2 class="text-4xl font-bold">Rp. {{ number_format($avgProductPrice, 2) }}</h2>
                </x-card>
            </div>

    {{-- <x-layout.admin.card> --}}
        {{-- table --}}
       <x-table :headers="['Image', 'Name', 'Price', 'Weight', 'Short Description', 'Description', 'status', 'Aksi']">
        @foreach ($products as $product)
        <tr wire:key='{{ $product->id }}'>
            <td x-data="{
                            idItem: {{$product->id}},
                            isChecked: function () {
                                return selectedItems.includes(this.idItem)
                            }
                        }">
                <label>
                    <input
                        type="checkbox"
                        class="checkbox"
                        value="{{ $product->id }}"
                        x-bind:checked="isChecked()"
                        x-model.number="selectedItems"
                        x-init="productIds.push(idItem);"
                        x-on:change="console.log(selectedItems); selectAll = selectAll ? false : false;"/>
                </label>
            </td>
            <td>
                <div class="avatar">
                    <div class="mask mask-squircle h-12 w-12">
                        <img
                        src="https://img.daisyui.com/images/profile/demo/2@94.webp"
                        alt="Avatar Tailwind CSS Component" />
                    </div>
              </div>
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->weight }}</td>
            <td>{{ $product->short_description }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->status }}</td>
            <td>
                <a href="{{ route('form.product.update', $product->slug) }}"
                    wire:wire:navigate
                    class="btn btn-ghost btn-xs">update</a>
                <button
                    type="btn" class="btn btn-error btn-xs"
                    x-on:click="$wire.deleteOneProduct({{$product->id}});"
                    >delete</button>
            </td>
        </tr>
        @endforeach
       </x-table>
    {{-- </x-layout.admin.card> --}}
</div>
