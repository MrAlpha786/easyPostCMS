@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Employee Feedback')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Feedback/Complaints</h2>
    <form class="grid" action="{{ route('storeFeedback') }}" method="POST">
        @csrf
        @method('POST')

        <!-- Hidden input to sent employee data  -->
        <input name="name" type="hidden" value="{{ auth()->user()->firstname }}">
        <input name="email" type="hidden" value="{{ auth()->user()->email }}" />
        <input name="type" type="hidden" value="1" />


        <!-- Custom textarea component for Feedback/Complaint Message -->
        <x-textarea id="content" name="content" label="Feedback/Complaint Message:" />

        <!-- Custom primary button component for form submission -->
        <x-primaryButton class="justify-self-end mt-2"><input class="inline-block px-4 py-2" type="submit"
                value="Submit"></x-primaryButton>
    </form>
@endsection
