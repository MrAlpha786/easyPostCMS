<!-- Courier information container -->
<div class="flex flex-col">

    <!-- Check if courier information is available -->
    @if ($courier)

        <h2 class="text-3xl font-semibold mb-4">Courier Details</h2>

        <div class="grid grid-cols-2 gap-4">

            <!-- Sender Information -->
            <div class="bg-slate-200 p-4 rounded-md shadow-md my">
                <h2 class="text-xl font-semibold mb-4">Sender Information:</h2>
                <p><span class="font-semibold">Name:</span> {{ $courier->sender_name }}</p>
                <p><span class="font-semibold">Address:</span>
                    {{ $courier->sender_address }}&nbsp;Pincode:&nbsp;{{ $courier->sender_pincode }}
                </p>
                <p><span class="font-semibold">Contact:</span> {{ $courier->sender_contact }}</p>
            </div>

            <!-- Recipient Information -->
            <div class="bg-slate-200 p-4 rounded-md shadow-md my">
                <h2 class="text-xl font-semibold mb-4">Recipient Information:</h2>
                <p><span class="font-semibold">Name:</span> {{ $courier->recipient_name }}</p>
                <p><span class="font-semibold">Address:</span>
                    {{ $courier->recipient_address }}&nbsp;Pincode:&nbsp;{{ $courier->recipient_pincode }}
                </p>
                <p><span class="font-semibold">Contact:</span> {{ $courier->recipient_contact }}</p>
            </div>
        </div>

        <!-- Check if courier has statuses and display them -->
        @if ($statuses && $statuses->count() > 0)
            <div class="bg-slate-200 p-4 rounded-md shadow-md my-4">
                <h2 class="text-xl font-semibold m-4 ml-0">Package status</h2>
                <div class="flex flex-col md:grid grid-cols-12">

                    <!-- Loop through statuses and display each one -->
                    @foreach ($statuses as $status)
                        <div class="flex md:contents">
                            <div class="col-start-2 col-end-3 relative">
                                <div class="h-full w-3 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                                </div>
                                <div class="w-3 h-3 absolute top-1/2 -mt-3 rounded-full bg-gray-800 shadow text-center">
                                </div>
                            </div>
                            <div
                                class="bg-gray-100 col-start-3 col-end-12 p-2 rounded-md my-4 mr-auto shadow-md w-full">
                                <p class="font-semibold mb-1">{{ $status->getStatusString() }}</p>
                                <p class="leading-tight text-justify w-full">
                                    {{ $status->created_at->toDayDateTimeString() }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif
    @endif

</div>
