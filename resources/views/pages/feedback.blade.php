<!-- Extending the 'layouts.home' template -->
@extends('layouts.home')

<!-- Setting the title for the 'Feedback/Complaints' page -->
@section('title', 'Feedback/Complaints')

<!-- Content section -->
@section('content')
    <h2 class="text-2xl font-semibold mb-6">Feedback & Complaints</h2>

    @include('forms.feedbackForm')
@endsection
