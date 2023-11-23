@extends('layouts.admin')

<!-- Setting the title for the page -->
@section('title', 'Create User')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Register User</h2>
    {{-- Include the user registration form --}}
    @include('forms.userForm', ['formRoute' => route('storeUser'), 'method' => 'POST'])
@endsection
