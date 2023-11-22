<!-- Form for submitting feedback and complaints with CSRF protection -->
<form class="grid" method="POST">
    @csrf

    <!-- Custom input component for Name -->
    <x-input id="name" name="name" type="text" label="Name" />

    <!-- Custom input component for Email -->
    <x-input id="email" name="email" type="email" label="Email" />

    <!-- Custom textarea component for Feedback/Complaint Message -->
    <x-textarea id="message" name="message" label="Feedback/Complaint Message:" />

    <!-- Custom primary button component for form submission -->
    <x-primaryButton class="justify-self-end mt-2"><input class="inline-block px-4 py-2" type="submit"
            value="Submit"></x-primaryButton>
</form>
