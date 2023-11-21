@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Update Courier')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Update Courier</h2>
    @include('forms.courierForm', ['formRoute' => route('updateCourier', $id), 'method' => 'PATCH'])
@endsection
