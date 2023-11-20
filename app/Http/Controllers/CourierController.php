<?php

namespace App\Http\Controllers;

use App\Enums\CourierStatusType;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Laravel\Prompts\Output\ConsoleOutput;
use stdClass;

class CourierController extends Controller
{

    /**
     * Show all application users.
     */
    public function index(): View
    {
        return view('admin.courierList', [
            'couriers' => Courier::paginate(15)
        ]);
    }


    /**
     * Show the form to create a new courier.
     */
    public function create(): View
    {
        if (auth()->check())
            return view('admin.createCourier', ['statusOptions' => CourierStatusType::cases()]);
        return view('pages.createCourier');
    }

    /**
     * Store a new courier.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'sender_name' => 'required|string|max:100',
            'sender_address' => 'required|string',
            'sender_contact' => 'required|string|max:20',
            'sender_pincode' => 'required|string|max:10',
            'recipient_name' => 'required|string|max:100',
            'recipient_address' => 'required|string',
            'recipient_contact' => 'required|string|max:20',
            'recipient_pincode' => 'required|string|max:10',
            'weight' => 'required|numeric|between:10,50000',
            'height' => 'required|numeric|between:5,100',
            'width' => 'required|numeric|between:5,100',
            'length' => 'required|numeric|between:5,100',
        ]);

        // Create a new shipping record
        $newCourier = new Courier();
        $newCourier->sender_name = $validatedData['sender_name'];
        $newCourier->sender_address = $validatedData['sender_address'];
        $newCourier->sender_contact = $validatedData['sender_contact'];
        $newCourier->sender_pincode = $validatedData['sender_pincode'];
        $newCourier->recipient_name = $validatedData['recipient_name'];
        $newCourier->recipient_address = $validatedData['recipient_address'];
        $newCourier->recipient_contact = $validatedData['recipient_contact'];
        $newCourier->recipient_pincode = $validatedData['recipient_pincode'];
        $newCourier->weight = $validatedData['weight'];
        $newCourier->height = $validatedData['height'];
        $newCourier->width = $validatedData['width'];
        $newCourier->length = $validatedData['length'];


        // Save the courier record
        $newCourier->save();

        return back()->with('success', 'Shipping information submitted successfully!');
    }

    public function showStatus(Request $request)
    {
        $validatedData = $request->validate([
            'tracking_number' => 'required|string|size:16',
        ]);

        $courier = Courier::where('tracking_number', $validatedData['tracking_number'])->first();

        $statuses = null;
        if ($courier)
            $statuses = $courier->trackingStatuses()->orderBy('created_at')->get();


        // $statuses = array();
        // if ($status) {
        //     foreach ($status as $s) {
        //         $obj = new class
        //         {
        //             public $created_at = $s->created_at;
        //             public $message = $s->status->toString();
        //         };
        //         $statuses[] = $obj;
        //     }
        // }

        return back()
            ->withInput($request->input())
            ->with(['statuses' => $statuses, 'courier' => $courier]);
    }
}
