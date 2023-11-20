<button {{ $attributes->merge(['class' => 'py-2 hover:text-red-500 disabled:pointer-events-none cursor-pointer']) }}>
    {{ $slot }}
</button>
