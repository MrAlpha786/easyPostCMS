@extends('layouts.homeLayout')

@section('title', 'Feedback/Complaints')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Feedback & Complaints</h2>
    <form name="form1" method="post" action="feedback-db.php">
        <div class="mb-4">
            <label for="name" class="text-sm font-medium text-gray-600">Name:</label>
            <input name="name" type="text" id="name" class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="email" class="text-sm font-medium text-gray-600">Email Id:</label><br>
            <input name="email" type="text" id="email" class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="message" class="text-sm font-medium text-gray-600">Feedback/Complaint Message:</label><br>
            <textarea name="message" rows="4" cols="40" class="mt-2 p-2 w-full border border-gray-300 rounded-md"></textarea>
        </div>

        <div class="flex justify-between">
            <input type="submit" value="Submit"
                onClick="MM_popupMsg('Dear User, fill out the form properly and submit. Your form will submit properly. If you face any problems, contact us.')"
                class="px-4 py-2 bg-gray-800 text-white rounded-md cursor-pointer hover:bg-blue-500 hover:text-white active:bg-blue-700 active:text-white">
            <input type="reset" value="Reset"
                class="px-4 py-2 bg-gray-500 text-white rounded-md cursor-pointer hover:bg-red-400">
        </div>
    </form>
@endsection
