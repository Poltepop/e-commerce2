<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'flex items-center justify-center w-full px-4 py-2 rounded-xl border'
]) }}>
    {{ $slot }}
</button>