@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
