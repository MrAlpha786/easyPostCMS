@extends('layouts.admin')

<!-- Setting the title for the page -->
@section('title', 'Update Courier')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Update Courier</h2>
    <p class="text-red-500 m-2 ">* Only change fields which you want to change, left others unchanged or empty.</p>
    {{-- Include form for courier update --}}
    @include('forms.courierForm', ['formRoute' => route('updateCourier', $id), 'method' => 'PATCH'])
@endsection
