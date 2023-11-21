<!-- Form for tracking courier with CSRF token -->
<form class="grid " action="{{ $formRoute }}" method="post" id="track-status-form">
    @csrf <!-- Generate a CSRF token -->
    @method($method)

    <!-- Custom input component for tracking number -->
    <x-input id="tracking_number" label="Tracking No." type="text" name="tracking_number" placeholder="EZP**********"
        :value="old('tracking_number')" />

    <!-- Custom primary button component -->
    <x-primaryButton label="Track Now" class="justify-self-end"><input type="submit" value="Search"></x-primaryButton>
</form>
