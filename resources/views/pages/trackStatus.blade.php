<!-- Extending the 'layouts.home' template -->
@extends('layouts.home')

<!-- Setting the title for the 'Track Courier' page -->
@section('title', 'Track Courier')

<!-- Content section -->
@section('content')
    <h2 class="text-2xl font-semibold mb-6">Tracker/Search Status</h2>

    <form class="grid " action="{{ route('trackCourier') }}" method="POST" id="track-status-form">
        @csrf <!-- Generate a CSRF token -->
        @method('GET')

        <!-- Custom input component for tracking number -->
        <x-input id="tracking_number" label="Tracking No." type="text" name="tracking_number" placeholder="EZP**********"
            :value="old('tracking_number')" />

        <!-- Custom primary button component -->
        <x-primaryButton label="Track Now" class="justify-self-end"><input class="inline-block px-4 py-2" type="submit"
                value="Search"></x-primaryButton>
    </form>

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
