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
            'height' => 'required|numeric|between:5,200',
            'width' => 'required|numeric|between:5,200',
            'length' => 'required|numeric|between:5,200',
            'status' => 'nullable|numeric',
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
        $newCourier->status = $validatedData['status'] ?? CourierStatusType::ITEM_ACCEPTED_BY_COURIER;


        // Save the courier record
        $newCourier->save();

        if (auth()->check())
            return redirect()->route('indexCourier');

        return back()->with('success', 'Shipping information submitted successfully!');
    }

    public function show($id)
    {
        $courier = Courier::findOrFail($id);

        $statuses = null;
        if ($courier)
            $statuses = $courier->trackingStatuses()->orderBy('created_at')->get();

        return view('admin.showCourier', ['courier' => $courier, 'statuses' => $statuses]);
    }

    public function trackCourier(Request $request)
    {
        $validatedData = $request->validate([
            'tracking_number' => 'required|string|alpha_num|size:16',
        ]);

        $courier = Courier::where('tracking_number', $validatedData['tracking_number'])->first();

        if (!$courier)
            return back()->withInput()->with('nodata', true);

        $statuses = $courier->trackingStatuses()->orderBy('created_at')->get();

        return back()
            ->withInput()
            ->with(['statuses' => $statuses ?? null, 'courier' => $courier ?? null]);
    }

    public function edit($id)
    {
        $courier = Courier::findOrFail($id);

        $data = $courier->toArray();

        return view('admin.editCourier', ['statusOptions' => CourierStatusType::cases()])->with($data);
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'sender_name' => 'nullable|string|max:100',
            'sender_address' => 'nullable|string',
            'sender_contact' => 'nullable|string|max:20',
            'sender_pincode' => 'nullable|string|max:10',
            'recipient_name' => 'nullable|string|max:100',
            'recipient_address' => 'nullable|string',
            'recipient_contact' => 'nullable|string|max:20',
            'recipient_pincode' => 'nullable|string|max:10',
            'weight' => 'nullable|numeric|between:10,50000',
            'height' => 'nullable|numeric|between:5,200',
            'width' => 'nullable|numeric|between:5,200',
            'length' => 'nullable|numeric|between:5,200',
            'status' => 'nullable|numeric',
        ]);

        $courier = Courier::findOrFail($id);
        $courier->update(array_filter($validatedData, function ($value) {
            return $value !== null;
        }));

        // You may add a flash message or other logic here

        return redirect()->route('indexCourier'); // Redirect to the courier index page after update
    }

    public function destroy($id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();

        return redirect()->route('indexCourier'); // Redirect to the courier index page after deletion
    }
}
