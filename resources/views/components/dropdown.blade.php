<!-- resources/views/components/select-input.blade.php -->

@props(['id', 'name', 'label'])

<div {{ $attributes->merge(['class' => 'block mb-4']) }}>

    <label for="{{ $id }}" class="inline-block">{{ $label }}:</label>
    <select id="{{ $id }}" name="{{ $name }}"
        class="shadow appearance-none py-2 px-4 text-gray-700 bg-gray-50 border border-gray-300 rounded-md w-full placeholder-gray-700">

        <option value="" disabled selected hidden>Choose a {{ $label }}</option>

        {{ $slot }}

    </select>

    <!-- Error message for validation errors -->
    @error($name)
        <div class="text-red-500 text-sm mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
