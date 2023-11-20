<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleType;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

        return view('admin.userList', [
            'users' => $query->whereNot('role', UserRoleType::ADMIN)->paginate(15)
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
            'lastname' => 'required|string|max:100',
            'email' => 'required|email',
            'role' => 'required|numeric',
            'password' => 'required|password',
        ]);

        // Create a new shipping record
        $newUser = new User();
        $newUser->firstname = $validatedData['firstname'];
        $newUser->lastname = $validatedData['lastname'];
        $newUser->email = $validatedData['email'];
        $newUser->role = $validatedData['role'];
        $newUser->password = $validatedData['password'];

        // Save the courier record
        $newUser->save();

        return redirect()->route('employeeList');
    }

    public function edit($id)
    {
        $courier = User::findOrFail($id);

        return view('admin.createUser', ['user' => $courier]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email',
            'role' => 'required|numeric',
            'password' => 'required|password',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        // You may add a flash message or other logic here

        return redirect()->route('employeeList'); // Redirect to the courier index page after update
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('employeeList'); // Redirect to the courier index page after deletion
    }
}
