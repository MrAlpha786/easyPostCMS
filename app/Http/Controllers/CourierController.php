<?php

namespace App\Http\Controllers;

use App\Enums\CourierStatusType;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourierController extends Controller
{

    /**
     * Show all application users.
     */
    public function index(Request $request): View
    {
        $search = $request->input('q');

        $query = Courier::query();

        if ($search) {
            $query->search($search);
        }

        $request->flash();

        return view('admin.courierList', [
            'couriers' => $query->paginate(15),
            'input' => $request->input(),
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

        if (auth()->check())
            return redirect()->route('courierList');

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

        return back()
            ->withInput($request->input())
            ->with(['statuses' => $statuses, 'courier' => $courier]);
    }

    public function edit($id)
    {
        $courier = Courier::findOrFail($id);

        return view('admin.createCourier', ['courier' => $courier]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $courier = Courier::findOrFail($id);
        $courier->update($request->all());

        // You may add a flash message or other logic here

        return redirect()->route('courierList'); // Redirect to the courier index page after update
    }

    public function destroy($id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();

        return redirect()->route('courierList'); // Redirect to the courier index page after deletion
    }
}
