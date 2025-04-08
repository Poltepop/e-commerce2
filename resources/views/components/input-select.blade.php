<select {{ $attributes->merge(['class' => 'block w-full p-2.5 bg-white border border-gray-300 text-gray-500 text-sm rounded-xl focus:ring-orange-500 focus:border-orange-500']) }}>
    <option disabled selected class="text-gray-300">Select an option</option>
    {{ $slot }}
</select>