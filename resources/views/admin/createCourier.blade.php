@extends('layouts.admin')

<!-- Setting the title for the page -->
@section('title', 'Create Courier')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Register Courier</h2>
    {{-- Include the form --}}
    @include('forms.courierForm', ['formRoute' => route('storeCourier'), 'method' => 'POST'])
@endsection
