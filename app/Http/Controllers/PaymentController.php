<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Show the form for payment confirmation
     */
    public function create(): View
    {
        return view('pages.processPayment');
    }

    /**
     * Process payment and return to the success page.
     */
    public function processPayment(Request $request)
    {
        // Check if the checkbox is ticked (payment successful)
        $paymentSuccess = $request->has('success_checkbox');

        // Redirect to the appropriate page based on checkbox state
        if ($paymentSuccess) {
            return redirect()->route('/register-courier');
        } else {
            return redirect()->route('/register-courier')->with('error', 'Payment failed. Please try again.');
        }
    }
}
