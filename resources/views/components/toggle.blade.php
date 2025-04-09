@props(['color' => 'blue'])

<label x-data="{ checked: false }" class="relative inline-flex items-center cursor-pointer">
    <input
        type="checkbox"
        x-model="checked"
        class="sr-only peer"
        {{ $attributes->merge([]) }}>

    <div
        :class="checked
            ? 'bg-orange-500'
            : 'bg-gray-300'"
        class="w-11 h-6 rounded-full transition-colors peer-focus:outline-none peer-focus:ring-1 peer-focus:ring-gray-300">
    </div>

    <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform"
        :class="checked ? 'translate-x-5' : ''">
    </div>
</label>

