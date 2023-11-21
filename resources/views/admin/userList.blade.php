@extends('layouts.admin')


@section('title', 'Employee List')

@section('content')
    @if (session('alert'))
        <x-alert :alert="session('alert')" />
    @endif

    <div class="bg-slate-200 p-4 rounded-md shadow-md ">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Employee List</h3>
            <x-primaryButton>
                <a href="{{ route('createUser') }}">Add New</a>
            </x-primaryButton>
        </div>
    </div>

    <div class="bg-slate-200 p-4 mt-4 rounded-md shadow-md ">
        <x-searchbar route="{{ route('indexUser') }}" />

        {{ $users->links('components.paginator') }}

        <table class="table-auto w-full border">
            <thead>
                <tr class="border-b-2 border-gray-800">
                    <th class="text-center">#</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Role</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800">
                @foreach ($users as $user)
                    <tr class="border-b border-gray-300">
                        <td class="text-center p-2">{{ $user->id }}</td>
                        <td class="p-2">{{ $user->firstname }}&nbsp;{{ $user->lastname }}</td>
                        <td class="p-2">
                            {{ $user->email }}
                        </td>
                        <td class="p-2">{{ $user->role->toString() }}</td>
                        <td class="p-2">
                            <div class="flex items-center justify-center">
                                <x-secondaryButton title="Update Profile" class="p-2 m-2">
                                    <a href="{{ route('editUser', $user->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </x-secondaryButton>

                                <x-secondaryButton title="Delete Profile" class="p-2 m-2"
                                    onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit();">
                                    <i class="fas fa-trash"></i>
                                    <form id="delete-user-form-{{ $user->id }}"
                                        action="{{ route('deleteUser', $user->id) }} " method="POST"
                                        style="display: none;">
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

        {{ $users->links('components.paginator') }}
    </div>
@endsection
