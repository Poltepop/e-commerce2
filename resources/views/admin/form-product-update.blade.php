<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        {{-- breadcrumbs --}}
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="{{ route('admin.products') }}">Products</a></li>
                <li>Form Update</li>
            </ul>
        </div>

        <div class="flex justify-between items-center">
            <x-layout.admin.header>
                Products Update
            </x-layout.admin.header>
        </div>
    </x-slot>

    {{-- Content --}}
    <div class="py-5">
        <div class="max-w-7xl mx-4 sm:px-6 md:mx-auto lg:px-8">
            <livewire:admin.form-product-update :slug="$slug"/>
        </div>
    </div>
</x-app-layout>
