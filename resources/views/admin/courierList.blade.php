@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Courier List')

@section('content')
    <div class="bg-slate-200 p-4 rounded-md shadow-md ">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Courier List</h3>
            <x-primaryButton>
                <a href="{{ route('createCourier') }}">Add New</a>
            </x-primaryButton>
        </div>
    </div>

    <div class="bg-slate-200 p-4 mt-4 rounded-md shadow-md ">
        <x-searchbar route="{{ route('courierList') }}" />

        <div class="container">
            @foreach ($couriers as $courier)
                {{ $courier->tracking_number }}
            @endforeach
        </div>

        {{ $couriers->links() }}


        <div class="flex w-full justify-between items-center">

            <!-- Buttons -->
            <x-secondaryButton class="flex items-center">
                <i class="fas fa-long-arrow-left px-2"></i>
                Prev
            </x-secondaryButton>

            <!-- Help text -->
            <span>
                Showing <span>1</span> to <span>10</span> of <span>100</span> Entries
            </span>

            <x-secondaryButton class="flex items-center">
                Next
                <i class="fas fa-long-arrow-right px-2"></i>
            </x-secondaryButton>

        </div>

        <div class="p-4">
            <table class="table-auto w-full border">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Staff</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $data = [
                            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                            ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                            // Add more data as needed
                        ];
                        $i = 1;
                    @endphp
                    @foreach ($data as $row)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td><b>{{ ucwords($row['name']) }}</b></td>
                            <td><b>{{ $row['email'] }}</b></td>
                            <td class="text-center">
                                <div class="space-x-2">
                                    <a href="index.php?page=edit_staff&id={{ $row['id'] }}"
                                        class="bg-blue-500 text-white py-2 px-4 rounded-md">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="bg-red-500 text-white py-2 px-4 rounded-md delete_staff"
                                        data-id="{{ $row['id'] }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
