@extends('layouts.admin')

<!-- Setting the title for the page -->
@section('title', 'Feedback List')

@section('content')
    {{-- Page title --}}
    <div class="bg-slate-200 p-4 rounded-md shadow-md ">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Feedback/Complaints</h3>
        </div>
    </div>

    {{-- Table showing feedbacks --}}
    <div class="bg-slate-200 p-4 mt-4 rounded-md shadow-md ">
        <x-searchbar route="{{ route('indexCourier') }}" />

        {{ $feedbacks->links('components.paginator') }}

        <table class="table-auto w-full border">
            <thead>
                <tr class="border-b-2 border-gray-800">
                    <th class="text-center">Id</th>
                    <th class="p-2 ">Name</th>
                    <th class="p-2 ">Email</th>
                    <th class="p-2 ">Message</th>
                    <th class="p-2 ">Type</th>
                    <th class="p-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800">
                @foreach ($feedbacks as $feedback)
                    <tr class="border-b border-gray-300 align-top">
                        <td class="text-center p-2">{{ $feedback->id }}</td>
                        <td class="p-2">{{ $feedback->name }}</td>
                        <td class="p-2">{{ $feedback->email }}</td>
                        <td class="p-2">{{ $feedback->content }}</td>
                        <td class="p-2">{{ $feedback->type }}</td>
                        <td class="p-2 text-center">
                            <x-secondaryButton title="Delete Feedback" class="p-2 m-2"
                                onclick="event.preventDefault(); document.getElementById('delete-feedback-form-{{ $feedback->id }}').submit();">
                                <i class="fas fa-trash"></i>
                                <form id="delete-feedback-form-{{ $feedback->id }}"
                                    action="{{ route('deleteFeedback', $feedback->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </x-secondaryButton>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $feedbacks->links('components.paginator') }}
    </div>
@endsection
