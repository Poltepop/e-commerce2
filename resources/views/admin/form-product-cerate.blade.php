<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        {{-- breadcrumbs --}}
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="{{ route('admin.products') }}">Products</a></li>
                <li>Form Create</li>
            </ul>
        </div>

        <div class="flex justify-between items-center">
            <x-layout.admin.header>
                Products Create
            </x-layout.admin.header>

        </div>
    </x-slot>

    {{-- Content --}}
    <livewire:admin.form-product-create/>
</x-app-layout>
