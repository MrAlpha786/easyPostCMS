@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Create User')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Register User</h2>
    @include('forms.userForm', ['formRoute' => route('storeUser'), 'method' => 'POST'])
@endsection
