@extends('layouts.homeLayout')

@section('title', 'Track Courier')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Track and Trace your Cargo/Courier</h2>

    <form action="/track-status" method="post" id="track-status-form">
        @csrf <!--generate a csrf token-->
        <label for="consignment">Tracking No.</label><br>
        <input id="consignment" name="tracking_number" type="text" placeholder="EZP2535335" class="form-input" required>
        <div class="text-center m-4">
            <button type="submit"
                class="bg-gray-800 text-white px-4 py-2 content-center rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Track
                Now</button>
        </div>
    </form>

    <div id="result-container">

    </div>
@endsection

<script>
    // Add this script in your Blade view or a separate JavaScript file
    $(document).ready(function() {
        $('#track-status-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(data) {
                    $('#result-container').html(data);
                }
            });
        });
    });
</script>
