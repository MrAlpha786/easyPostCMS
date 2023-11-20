@extends('layouts.app')

@section('main')
    <div class="flex h-screen">

        <!-- Navigation sidebar -->
        <aside class="bg-gray-800 text-white w-64 px-4 py-6 main-sidebar items-center elevation-4 overflow-y-auto">
            <!-- Brand/logo -->
            <div class="font-black text-4xl text-center">
                EasyPost
            </div>
            <div class="w-full h-1 bg-white my-4"></div>

            <!-- Dashboard -->
            <x-sidebarMenuItem href="{{ route('dashboard') }}" label="Dashboard" />
            
            <!-- Employees -->
            <x-sidebarMenuItem href="{{ route('employeeList') }}" label="Employees" id="employee-menu" :menuItems="[
                ['label' => 'Add New', 'href' => route('createEmployee')],
                ['label' => 'List', 'href' => route('employeeList')],
            ]" />

            <!-- Couriers -->
            <x-sidebarMenuItem href="{{ route('courierList') }}" label="Couriers" id="courier-munu" :menuItems="[
                ['label' => 'Add New', 'href' => route('createCourier')],
                ['label' => 'List', 'href' => route('courierList')],
            ]" />


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
