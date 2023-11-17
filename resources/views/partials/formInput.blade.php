<div class="mb-6">
    <label for="{{ $inputId }}" class="block mb-2">{{ $labelText }}:</label>
    <input type="{{ $inputType }}" id="{{ $inputId }}" name="{{ $inputName }}"
        class="form-input @error($inputName) border-red-500 @enderror" value="{{ old($inputName) }}">

    @error($inputName)
        <div class="form-input-error">
            {{ $message }}
        </div>
    @enderror
</div>
