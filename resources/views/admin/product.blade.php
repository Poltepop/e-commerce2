<x-app-layout>

    <x-slot name="header">
        {{-- breadcrumbs --}}
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li>Products</li>
            </ul>
        </div>

        {{-- Header --}}
        <div class="flex justify-between items-center">
            <x-layout.admin.header>
                Products
            </x-layout.admin.header>

            <a href="{{ route('form.product.create') }}" class="btn btn-warning rounded-xl">Create</a>
        </div>
    </x-slot>

    {{-- Content --}}
    <livewire:admin.product-page/>
  
</x-app-layout>
