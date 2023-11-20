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

        {{ $couriers->links('components.paginator') }}

        <table class="table-auto w-full border">
            <thead>
                <tr class="border-b-2 border-gray-800">
                    <th class="text-center">#</th>
                    <th>Tracking Number</th>
                    <th>Recipient Information</th>
                    <th>Sender Information</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800">
                @foreach ($couriers as $courier)
                    <tr class="border-b border-gray-300 align-top">
                        <td class="text-center p-2">{{ $courier->id }}</td>
                        <td class="p-2">{{ $courier->tracking_number }}</td>
                        <td class="p-2">
                            {{ $courier->recipient_name }}<br />{{ $courier->recipient_address }}<br />{{ $courier->recipient_contact }}<br />Pincode:{{ $courier->recipient_pincode }}
                        </td>
                        <td class="p-2">
                            {{ $courier->sender_name }}<br />{{ $courier->sender_address }}<br />{{ $courier->sender_contact }}<br />Pincode:{{ $courier->sender_pincode }}
                        </td>
                        <td class="p-2">{{ $courier->status->toString() }}</td>
                        <td class="p-2">
                            <div class="flex flex-col">
                                <x-secondaryButton title="Update Status" class="p-2 m-2">
                                    <a href="{{ route('updateStatus', $courier->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </x-secondaryButton>

                                <x-secondaryButton title="Delete Courier" class="p-2 m-2"
                                    onclick="event.preventDefault(); document.getElementById('delete-courier-form').submit();">
                                    <i class="fas fa-trash"></i>
                                    <form id="delete-courier-form" action="{{ route('deleteCourier', $courier->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </x-secondaryButton>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $couriers->links('components.paginator') }}
    </div>
@endsection
