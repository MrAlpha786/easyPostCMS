@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Create Courier')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Register Courier</h2>
    @include('forms.courierForm', ['formRoute' => route('createCourier'), 'method' => 'POST'])
@endsection
