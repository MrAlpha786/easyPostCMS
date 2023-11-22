<!-- Extending the 'layouts.home' template -->
@extends('layouts.home')

<!-- Setting the title for the 'Courier Registration' page -->
@section('title', 'Courier Registration')

<!-- Content section -->
@section('content')
    <h2 class="text-2xl font-semibold mb-6">Courier Information Form</h2>
    @include('forms.courierForm', ['formRoute' => route('registerCourier'), 'method' => 'POST'])
@endsection
