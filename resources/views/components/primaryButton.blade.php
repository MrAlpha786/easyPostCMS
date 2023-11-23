{{-- Custom Primary button --}}
<button
    {{ $attributes->merge(['class' => 'w-fit bg-gray-800 text-white rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800']) }}>
    {{ $slot }}
</button>
