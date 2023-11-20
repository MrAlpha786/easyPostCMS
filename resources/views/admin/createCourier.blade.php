@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Create Courier')

@section('content')
    <x-alert />
    @include('forms.newCourierForm')
@endsection
