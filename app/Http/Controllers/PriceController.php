<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\View\View;

class PriceController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function edit(): View
    {
        $data = Price::get(['max_weight', 'max_distance', 'rate'])->toArray();
        return view('admin.editPrices', ['data' => $data]);
    }

    public function showPricelist(): View
    {
        $data = Price::get(['max_weight', 'max_distance', 'rate'])->toArray();
        return view('pages.pricelist', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'newData' => 'required|array',
            'newData.*.*' => 'required|numeric|min:0',
        ]);

        // update the price table and return success
        if (Price::validateAndUpdate($validatedData['newData'])) {
            $data = Price::get(['max_weight', 'max_distance', 'rate'])->toArray();
            $alert = ['type' => 'success', 'title' => 'Updated Successfully!', 'message' => 'Price table updated successfully!'];
            return redirect()->route('editPrices')->with('alert', $alert);
        }

        $alert = ['type' => 'error', 'title' => 'Update Failed!', 'message' => 'Unable to price!'];
        return redirect()->route('editPrices')->with('alert', $alert);
    }
}
