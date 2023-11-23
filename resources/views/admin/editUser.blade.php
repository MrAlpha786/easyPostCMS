@extends('layouts.admin')

<!-- Setting the title for the page -->
@section('title', 'Update User')

@section('content')
    <h2 class="text-3xl font-semibold mb-4">Update User</h2>
    <p class="text-red-500 m-2">* Only change fields which you want to change, left others unchanged or empty.</p>
    
    {{-- Include the user update form --}}
    @include('forms.userForm', ['formRoute' => route('updateUser', $id), 'method' => 'PATCH'])
@endsection
