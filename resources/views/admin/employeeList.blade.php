@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Employee List')

@section('content')

    <div class="col-span-12">
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <x-primaryButton>
                <a href="{{ route('createEmployee') }}">Add Employee</a>
            </x-primaryButton>
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
                                        <button type="button"
                                            class="bg-red-500 text-white py-2 px-4 rounded-md delete_staff"
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
    </div>


@endsection
