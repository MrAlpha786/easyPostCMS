<!-- Extending the 'layouts.app' template -->
@extends('layouts.app')

<!-- Section for the main content -->
@section('main')
    <!-- Header section -->
    <header class="bg-white-500 p-4 shadow-lg flex items-center">
        <!-- Brand/logo -->
        <div class="font-black text-4xl">
            EasyPost
        </div>
        <div class="text-4xl mx-2">|</div>

        <!-- Slogan/description -->
        <div class="text-lg">
            Simplifying Shipping for Everyone
        </div>

        <x-authButton />

    </header>


    <!-- Wrapper for the main content -->
    <div id="wrapper" class="flex mb-auto max-w-screen-lg">

        <!-- Navigation sidebar -->
        <aside class="bg-gray-800 text-white w-64 p-6 h-min">

            <!-- Home link -->
            <a href="{{ route('home') }}" class="block py-2">Home</a>

            <!-- Tracker/Search Status link -->
            <a href="{{ route('tracker') }}" class="block py-2">Tracker/Search Status</a>

            <!-- Courier Registration link -->
            <a href="{{ route('createCourier') }}" class="block py-2">Courier Registration</a>

            <!-- Price List link -->
            <a href="{{ route('pricelist') }}" class="block py-2">Price List</a>

            <!-- Complain/Feedback link -->
            <a href="{{ route('feedback') }}" class="block py-2">Complain/Feedback</a>

            <!-- Contact Us link -->
            <a href="{{ route('contact') }}" class="block py-2">Contact Us</a>

            <!-- About Us link -->
            <a href="{{ route('about') }}" class="block py-2">About Us</a>

        </aside>


        <!-- Content wrapper -->
        <div id="content-wrapper" class="w-full p-4">

            <!-- Yielding the content section -->
            @yield('content')

        </div>
    </div>

    <!-- Footer section -->
    <footer class="bg-gray-800 text-white flex justify-between p-4">
        <p>All Rights Reserved</p>
        <p>Project Design & Developed By - MD Faizan 2100328785</p>
    </footer>

    <!-- End of the main section -->
@endsection
