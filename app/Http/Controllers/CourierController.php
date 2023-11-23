<?php

namespace App\Http\Controllers;

use App\Enums\CourierStatusType;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

// Control all courier related routes.
class CourierController extends Controller
{
    /**
     * Validate the request data
     */
    private function __validate(Request $request): array
    {
        // Validate the form data
        return $request->validate([
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
    }

    /**
     * Create a courior object and return for futher handling
     */
    private function __store($validatedData): Courier
    {
        try {
            // Create a new shipping record
            $courier = new Courier();
            $courier->sender_name = $validatedData['sender_name'];
            $courier->sender_address = $validatedData['sender_address'];
            $courier->sender_contact = $validatedData['sender_contact'];
            $courier->sender_pincode = $validatedData['sender_pincode'];
            $courier->recipient_name = $validatedData['recipient_name'];
            $courier->recipient_address = $validatedData['recipient_address'];
            $courier->recipient_contact = $validatedData['recipient_contact'];
            $courier->recipient_pincode = $validatedData['recipient_pincode'];
            $courier->weight = $validatedData['weight'];
            $courier->height = $validatedData['height'];
            $courier->width = $validatedData['width'];
            $courier->length = $validatedData['length'];
            $courier->status = $validatedData['status'] ?? CourierStatusType::ITEM_ACCEPTED_BY_COURIER;
        } catch (\Throwable $th) {
            return null;
        }

        return $courier;
    }

    /**
     * Show all courior in a pagination view
     */
    public function index(Request $request): View
    {
        // If request contains a search query filter the results
        $search = $request->input('q');
        $query = Courier::query();
        if ($search) {
            $query->search($search);
        }

        $request->flash();

        return view('admin.indexCouriers', [
            'couriers' => $query->orderBy('updated_at', 'desc')->paginate(15),
        ]);
    }


    /**
     * Show the form to create a new courier.
     */
    public function create(): View
    {
        return view('admin.createCourier', ['statusOptions' => CourierStatusType::cases()]);
    }


    /**
     * Store a new courier.
     */
    public function store(Request $request)
    {
        $validatedData = $this->__validate($request);

        try {
            $courier = $this->__store($validatedData);
            $courier->save();

            $alert = ['type' => 'success', 'title' => 'Success!', 'message' => 'Courier Created Successfully! TN: ' . $courier->tracking_number . ' and Price: ' . $courier->price, 'dismissable' => true];
        } catch (\Throwable $th) {
            $alert = ['type' => 'error', 'title' => 'Failded!', 'message' => 'Courier Not Created!'];
        }


        return redirect()->route('indexCourier')->with('alert', $alert);
    }

    /**
     * Show the courior info.
     */
    public function show($id)
    {
        $courier = Courier::findOrFail($id);

        $statuses = null;
        if ($courier)
            $statuses = $courier->trackingStatuses()->orderBy('created_at')->get();

        return view('admin.showCourier', ['courier' => $courier, 'statuses' => $statuses]);
    }

    /**
     * Show the courier update form.
     */
    public function edit($id)
    {
        $courier = Courier::findOrFail($id);

        $data = $courier->toArray();

        return view('admin.editCourier', ['statusOptions' => CourierStatusType::cases()])->with($data);
    }

    /**
     * Update the courier after validating input.
     */
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

        $alert = ['type' => 'success', 'title' => 'Success!', 'message' => 'Courier Updated Successfully!'];

        return redirect()->route('indexCourier')->with('alert', $alert); // Redirect to the courier index page after update
    }

    /**
     * Delete the courier.
     */
    public function destroy($id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();

        $alert = ['type' => 'info', 'title' => 'Deleted!', 'message' => 'Courier Deleted Successfully!'];

        return redirect()->route('indexCourier')->with('alert', $alert); // Redirect to the courier index page after deletion
    }

    /**
     * Show the new courier form to customers.
     */
    public function createCourier(): View
    {
        return view('pages.createCourier');
    }

    /**
     * Create a courier for customer and redirect him to payment portal.
     */
    public function registerCourier(Request $request)
    {
        $validatedData = $this->__validate($request);

        try {
            $courier = $this->__store($validatedData);
            $courier->save();
        } catch (\Throwable $th) {
            $alert = ['type' => 'error', 'title' => 'Failed!', 'message' => 'Something Went Wrong!'];
            return back()->with('alert', $alert);
        }
        // Encrypt the information before sending, in real world scenerio Secret keys are used to securely exchange data.
        $encryptedData = Crypt::encrypt(['courier_id' => $courier->id, 'courier_price' => $courier->price]);

        return redirect()->route('createPayment', ['data' => urlencode($encryptedData)]);
    }

    /**
     * Find the courier using tracking number.
     */
    public function trackCourier(Request $request)
    {
        $validatedData = $request->validate([
            'tracking_number' => 'required|string|alpha_num|size:16',
        ]);

        $courier = Courier::whereRaw("BINARY `tracking_number` = ?", $validatedData['tracking_number'])->first();

        if (!$courier)
            return back()->withInput()->with('nodata', true);

        // Find the status update for this courier.
        $statuses = $courier->trackingStatuses()->orderBy('created_at')->get();

        return back()
            ->withInput()
            ->with(['statuses' => $statuses ?? null, 'courier' => $courier]);
    }
}
