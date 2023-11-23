<!-- Custom textarea component with props for id, name, and label -->
@props(['id', 'name', 'label'])

{{-- Custom textarea component --}}
<div {{ $attributes->merge(['class' => 'block mb-4']) }}>

    <label for="{{ $id }}" class="inline-block">{{ $label }}</label>

    <textarea name="{{ $name }}" rows="4" cols="40"
        class="mt-2 p-2 w-full border rounded-md shadow appearance-none py-2 px-3 text-gray-700 leading-tight; @error($name) border-red-500 @enderror"
        value="{{ old($name) }}"></textarea>

    <!-- Error message for validation errors -->
    @error($name)
        <div class="text-red-500 text-sm mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
