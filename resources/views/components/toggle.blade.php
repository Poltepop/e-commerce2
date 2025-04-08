@props(['color' => 'blue'])

<label class="relative inline-flex items-center cursor-pointer">
    <input type="checkbox" class="sr-only peer" {{ $attributes->merge([]) }}>
    <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-1 peer-focus:ring-gray-300 rounded-full peer peer-checked:bg-{{$color}}-500 transition-colors"></div>
    <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-5"></div>
</label>