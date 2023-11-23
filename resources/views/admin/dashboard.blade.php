@extends('layouts.admin')

<!-- Setting the title for the page -->
@section('title', 'Dashboard')

@section('content')
    {{-- Welcome Message --}}
    <div class="bg-slate-200 p-4 rounded-md shadow-md ">
        <h2 class="text-3xl font-semibold ">Welcome&nbsp;<span
                class="capitalize text-red-500">{{ auth()->user()->firstname }}!</span></h2>
    </div>

    {{-- Dynamically generate the stats --}}
    @isset($stats)
        <div class="mt-4">
            <h3 class="text-2xl font-semibold my-4">Statistics</h3>
            <div class="grid grid-cols-5 gap-4 text-left">
                @foreach ($stats as $key => $value)
                    <div class="bg-slate-200 p-4 rounded-md shadow-md flex flex-col justify-between">
                        <h2 class="text-xl font-semibold">{{ $key }}</h2>
                        <h2 class="text-2xl font-semibold text-red-500 p-4 text-center">{{ $value }}</h2>
                    </div>
                @endforeach
            </div>
        </div>
    @endisset
@endsection
