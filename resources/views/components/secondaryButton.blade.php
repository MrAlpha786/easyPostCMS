@props(['slot'])

<div {{ $attributes->merge(['class' => 'py-2 hover:text-red-500 cursor-pointer']) }}>
    {{ $slot }}
</div>
