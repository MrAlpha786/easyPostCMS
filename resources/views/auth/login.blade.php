@extends('layouts.app')

@section('title', 'Employee Login')

@section('main')
    <div class="flex h-screen bg-gray-900">
        <div class="=flex m-auto bg-gray-300 w-fit p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold mb-4">Employee Log In</h3>
            <form class="grid" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <x-input id="email" label="Email" name="email" type="email" placeholder="example@email.com" />

                <!-- Password -->
                <x-input id="password" label="Password" name="password" type="password" />

                <!-- Remember Me -->
                <div class="block">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <x-primaryButton class="justify-self-end">
                    <input type="submit" value="Log In" class="inline-block px-4 py-2">
                </x-primaryButton>

            </form>
        </div>
    </div>
@endsection
