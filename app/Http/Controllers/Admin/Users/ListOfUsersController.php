<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListOfUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.user-list', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.create-user');
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'university_id' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'home_address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'role' => $request->role,
            'department' => $request->department,
            'university_id' => $request->university_id,
            'username' => $request->username,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'home_address' => $request->home_address,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.list')->with('success', 'User created successfully!');
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('admin.users.edit-user', compact('user'));
    }

    // Update the specified user in the database
    public function update(Request $request, User $user)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'university_id' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'home_address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->update($request->except(['password', 'profile_picture']));

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.list')->with('success', 'User updated successfully!');
    }

    // Remove the specified user from the database
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.list')->with('success', 'User deleted successfully!');
    }
}

