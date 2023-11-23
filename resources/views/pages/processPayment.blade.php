<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans text-justify flex flex-col h-screen justify-between">

    <div id="wrapper" class="flex mb-auto">
        <div id="content-wrapper" class="w-full p-4">
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">
                <h2 class="text-2xl font-semibold mb-6">Demo Payment Page</h2>

                <div class="flex justify-between my-4 border-t border-b py-4">
                    <p class="font-bold">Total:</p>
                    <p class="font-bold text-red-500">&#8377; {{ $courier_price }}</p>
                </div>

                <form action="{{ route('processPayment') }}" id="payment-form" method="POST">
                    @csrf
                    <input type="hidden" name="courier_id" value="{{ $courier_id }}" />
                    <label for="success_checkbox" class="block mb-4">
                        <input type="checkbox" id="success_checkbox" name="success_checkbox" value="success_checkbox">
                        <span class="ml-2">I have paid</span>
                    </label>

                    <x-primaryButton type="submit" id="confirmPayment" class="px-4 py-2 ">
                        Confirm Payment
                    </x-primaryButton>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
