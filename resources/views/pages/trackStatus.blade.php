<!-- Extending the 'layouts.home' template -->
@extends('layouts.home')

<!-- Setting the title for the 'Track Courier' page -->
@section('title', 'Track Courier')

<!-- Content section -->
@section('content')
    <h2 class="text-2xl font-semibold mb-6">Tracker/Search Status</h2>

    @include('forms.trackStatusForm', ['formRoute' => route('trackCourier'), 'method' => 'GET'])

    <!-- Check if a courier is available in the session -->
    @if (session()->has('courier'))
        <!-- PHP block to retrieve courier and statuses from the session -->
        @php
            $courier = session('courier');
            if (session()->has('statuses')) {
                $statuses = session('statuses');
            }
        @endphp

        <!-- Include the 'partials.courierStatus' view -->
        @include('partials.courierStatus')
    @endif

    @if (session()->has('nodata'))
        <p class="text-red-500 py-4">No courier found! Check your input or try again after some time. It may take time to
            update courier status.
        </p>
    @endif
@endsection
