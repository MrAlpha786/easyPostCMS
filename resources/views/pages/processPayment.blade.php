<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans text-justify flex flex-col h-screen justify-between">

    @include('partials.header')

    <div id="wrapper" class="flex mb-auto">
        <div id="content-wrapper" class="w-full p-4">
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">
                <h2 class="text-2xl font-semibold mb-6">Demo Payment Page</h2>

                <form action="{{ route('courier.register') }}" id="payment-form">
                    @csrf
                    <label for="success_checkbox" class="block mb-4">
                        <input type="checkbox" id="success_checkbox" name="success_checkbox">
                        <span class="ml-2">I have paid</span>
                    </label>

                    <button type="submit" id="confirmPayment"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        Confirm Payment
                    </button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.footer')

</body>

</html>
