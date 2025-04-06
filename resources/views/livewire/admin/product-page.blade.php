<div>
    {{-- Ket --}}
    <div class="mb-5 gap-4 md:gap-5 flex flex-col md:flex-row">
        {{-- total products --}}
        <x-layout.admin.card class="w-full flex-col px-10">
            <h1 class=" text-gray-500">Total products</h1>
            <h2 class="text-4xl font-bold">{{ $productQty }}</h2>
        </x-layout.admin.card>
        {{-- Products inventory --}}
        <x-layout.admin.card class="w-full flex-col px-10">
            <h1 class=" text-gray-500">Product inventory</h1>
            <h2 class="text-4xl font-bold">66</h2>
        </x-layout.admin.card>
        {{-- Avg Price --}}
        <x-layout.admin.card class="w-full flex-col px-10">
            <h1 class=" text-gray-500">Average price</h1>
            <h2 class="text-4xl font-bold">Rp. {{ number_format($avgProductPrice, 2) }}</h2>
        </x-layout.admin.card>
    </div>


    {{-- <x-layout.admin.card> --}}
        {{-- table --}}
        {{ json_encode($productSelected) }}
       <x-table :headers="['Image','Name','Price','Weight','Short Description', 'Description', 'status', 'Aksi']">
        @foreach ($products as $product)
        <tr wire:key='{{ $product->id }}'>
            <th>
                <label>
                    <input
                        type="checkbox"
                        class="checkbox"
                        value="{{ $product->id }}"
                        x-bind:checked="selectAll"
                        wire:click='changeProductSelected({{ $product->id }})'/>
                </label>
            </th>
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
            <th>
                <button class="btn btn-ghost btn-xs">details</button>
            </th>
        </tr>
        @endforeach
       </x-table>
    {{-- </x-layout.admin.card> --}}
</div>
