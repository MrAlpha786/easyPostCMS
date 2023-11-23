{{-- Custom secondary button component --}}
<div {{ $attributes->merge(['class' => 'p-2 hover:text-red-500 disabled:pointer-events-none cursor-pointer']) }}>
    {{ $slot }}
</div>
