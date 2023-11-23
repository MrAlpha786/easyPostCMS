{{-- Admin layout --}}
@extends('layouts.app')

@section('main')
    <div class="flex h-screen">

        <!-- Navigation sidebar -->
        <aside class="bg-gray-800 text-white w-64 px-4 py-6 main-sidebar items-center elevation-4 overflow-y-auto">
            <!-- Brand/logo -->
            <div class="font-black text-4xl text-center">
                <a href="{{ route('home') }}">
                    EasyPost
                </a>
            </div>
            <div class="w-full h-1 bg-white my-4"></div>

            <!-- Dashboard -->
            <x-sidebarMenuItem href="{{ route('dashboard') }}" label="Dashboard" />

            @role('admin')
                <!-- Employees -->
                <x-sidebarMenuItem href="{{ route('indexUser') }}" label="Employees" id="employee-menu" :menuItems="[
                    ['label' => 'Add New', 'href' => route('createUser')],
                    ['label' => 'List', 'href' => route('indexUser')],
                ]" />
            @endrole

            <!-- Couriers -->
            <x-sidebarMenuItem href="{{ route('indexCourier') }}" label="Couriers" id="courier-munu" :menuItems="[
                ['label' => 'Add New', 'href' => route('createCourier')],
                ['label' => 'List', 'href' => route('indexCourier')],
            ]" />

            {{-- Feedbacks for Admin --}}
            @role('admin')
                <x-sidebarMenuItem href="{{ route('indexFeedback') }}" label="Feedback/Complaints" id="feedback-menu" />
                <x-sidebarMenuItem href="{{ route('editPrices') }}" label="Price Table" id="price-menu" />
            @endrole

            {{-- Feedback form for Clerks --}}
            @role('clerk')
                <x-sidebarMenuItem href="{{ route('createFeedback') }}" label="Feedback/Complaints" id="feedback-menu" />
            @endrole


            <div class="fixed bottom-0 p-4">
                <p>All Rights Reserved</p>
            </div>

        </aside>


        <div class="flex flex-col w-full">
            <!-- Header section -->
            <header class="bg-white-500 p-4 shadow-lg flex items-center">
                <!-- Slogan/description -->
                <div class="text-lg">
                    Simplifying Shipping for Everyone
                </div>

                <x-authButton />
            </header>

            <!-- Content wrapper -->
            <div id="content-wrapper" class="flex-1 overflow-x-hidden overflow-y-auto p-4">
                @if (session('alert'))
                    <x-alert :alert="session('alert')" />
                @endif
                <!-- Yielding the content section -->
                @yield('content')

            </div>

            <!-- Footer section -->
            <footer class="bg-gray-800 text-white flex justify-end p-4">
                <p>Project Designed & Developed By - MD Faizan 2100328785</p>
            </footer>
        </div>
    </div>
@endsection
