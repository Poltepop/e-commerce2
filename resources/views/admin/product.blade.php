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

            <button class="btn btn-warning rounded-xl">Create</button>
        </div>
    </x-slot>

    {{-- Content --}}
    <div class="py-5">
        <div class="max-w-7xl mx-4 sm:px-6 md:mx-auto lg:px-8">
            <livewire:admin.product-page/>
        </div>
    </div>
</x-app-layout>
