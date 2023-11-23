<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Show the form for payment confirmation
     */
    public function create(Request $request): View
    {
        $encryptedData = urldecode($request->input('data'));
        // Decrypt the data
        $decryptedData = Crypt::decrypt($encryptedData);
        $token = uniqid();
        return view('pages.processPayment', $decryptedData);
    }

    /**
     * Process payment and return to the success page.
     */
    public function processPayment(Request $request)
    {
        // Check if the checkbox is ticked (payment successful)
        $paymentSuccess = $request->has('success_checkbox');

        $courier = Courier::findOrFail($request->courier_id);

        // Redirect to the appropriate page based on checkbox state
        if ($paymentSuccess) {
            $tracking_number = $courier->tracking_number;
            return redirect()->route('paymentSuccess', ['tn' => $tracking_number]);
        } else {
            $courier->delete();
            return redirect()->route('paymentFailure');
        }
    }

    public function paymentSuccess(Request $request)
    {
        $alert = ['type' => 'success', 'title' => 'Success!', 'message' => 'Courier registered successfully, Please Note down your TN: ' . $request->tn, 'dismissable' => true];
        return redirect()->intended(route('courier'))->with('alert', $alert);
    }

    public function paymentFailure()
    {
        $alert = ['type' => 'error', 'title' => 'Error!', 'message' => 'Payment failed!'];
        return redirect()->intended(route('courier'))->with('alert', $alert);
    }
}
