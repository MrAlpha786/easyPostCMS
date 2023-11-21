@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Update User')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Update User</h2>
    @include('forms.userForm', ['formRoute' => route('updateUser', $id), 'method' => 'PATCH'])
@endsection
