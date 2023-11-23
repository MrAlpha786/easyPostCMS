@extends('layouts.admin')

<!-- Setting the title for the page -->
@section('title', 'Courier Details')

@section('content')
    {{-- Include courier detail partial --}}
    @include('partials.courierStatus')
@endsection
