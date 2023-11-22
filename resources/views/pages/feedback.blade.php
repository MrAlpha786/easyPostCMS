<!-- Extending the 'layouts.home' template -->
@extends('layouts.home')

<!-- Setting the title for the 'Feedback/Complaints' page -->
@section('title', 'Feedback/Complaints')

<!-- Content section -->
@section('content')
    <h2 class="text-2xl font-semibold mb-6">Feedback & Complaints</h2>

    <form class="grid" action="{{ route('submitFeedback') }}" method="POST">
        @csrf
        @method('POST')
        <input name="type" type="hidden" value="1" />

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
@endsection
