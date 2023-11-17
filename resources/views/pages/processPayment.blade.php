<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans text-justify flex flex-col h-screen justify-between">

    @include('partials.header')

    <div id="wrapper" class="flex mb-auto max-w-screen-lg">
        <div id="content-wrapper" class="w-full p-4">
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">
                <h2 class="text-2xl font-semibold mb-6">Demo Payment Page</h2>

                <form id="payment-form">
                    <label for="paymentStatus" class="block mb-4">
                        <input type="checkbox" id="paymentStatus" name="paymentStatus">
                        <span class="ml-2">I have paid</span>
                    </label>

                    <button type="button" id="confirmPayment"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        Confirm Payment
                    </button>
                </form>

                <div id="payment-response" class="mt-6"></div>
            </div>
        </div>
    </div>

    @include('partials.footer')
    <script>
        document.getElementById('confirmPayment').addEventListener('click', function() {
            const paymentStatus = document.getElementById('paymentStatus').checked;

            // Simulate a server response based on the checkbox status
            const responseMessage = paymentStatus ?
                'Payment confirmed! Thank you for your payment.' :
                'Please check the "I have paid" checkbox before confirming payment.';

            // Send the response back to the controller that initiated the request
            window.opener.postMessage({
                paymentStatus,
                responseMessage
            }, window.opener.location.origin);

            // Close the current window
            window.close();
        });
    </script>
</body>

</html>
