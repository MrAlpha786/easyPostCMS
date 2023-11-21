<!-- Custom input component -->
@props(['id', 'type', 'name', 'value'=>null, 'label', 'placeholder' => null])

<div {{ $attributes->merge(['class' => 'block mb-4']) }}>

    <label for="{{ $id }}" class="inline-block">{{ $label }}:</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight @error($name) border-red-500 @enderror"
        value="{{ $value }}">

    <!-- Error message for validation errors -->
    @error($name)
        <div class="text-red-500 text-sm mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
