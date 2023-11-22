<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleType;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Show all application users.
     */
    public function index(Request $request): View
    {
        $search = $request->input('q');

        $query = User::query();

        if ($search) {
            $query->search($search);
        }

        $request->flash();

        return view('admin.indexUsers', [
            'users' => $query->whereNot('role', UserRoleType::ADMIN)
                ->orderBy('updated_at', 'desc')
                ->paginate(15)
        ]);
    }

    /**
     * Show the form to create a new courier.
     */
    public function create(): View
    {
        return view('admin.createUser', ['roleOptions' => UserRoleType::cases()]);
    }

    /**
     * Store a new courier.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'email' => 'required|email',
            'role' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // Create a new shipping record
        User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'] ?? '',
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'password' => $validatedData['password']
        ]);

        $alert = ['type' => 'success', 'title' => 'Success!', 'message' => 'User Created Successfully!'];

        return redirect()->route('indexUser')->with('alert', $alert);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $data = $user->toArray();

        return view('admin.editUser', ['roleOptions' => UserRoleType::cases()])->with($data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'nullable|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'role' => 'nullable|numeric',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update(array_filter($validatedData, function ($value) {
            return $value !== null;
        }));

        $alert = ['type' => 'success', 'title' => 'Success!', 'message' => 'User Updated Successfully!'];

        return redirect()->route('indexUser')->with('alert', $alert); // Redirect to the courier index page after update
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $alert = ['type' => 'info', 'title' => 'Deleted!', 'message' => 'User Deleted Successfully!'];

        return redirect()->route('indexUser')->with('alert', $alert); // Redirect to the courier index page after deletion
    }
}
