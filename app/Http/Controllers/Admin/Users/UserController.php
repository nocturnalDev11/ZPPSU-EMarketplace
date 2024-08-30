<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.user-list', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create-user');
    }

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

    public function show($id)
    {
        $user = User::findOrFail($id);

        $posts = collect($user->posts()->get())->map(function ($post) {
            return [
                'title' => $post->post_title,
                'created_at' => $post->created_at,
                'type' => 'Post'
            ];
        });

        $products = collect($user->products()->get())->map(function ($product) {
            return [
                'title' => $product->prod_name,
                'created_at' => $product->created_at,
                'type' => 'Product'
            ];
        });

        $services = collect($user->services()->get())->map(function ($service) {
            return [
                'title' => $service->services_title,
                'created_at' => $service->created_at,
                'type' => 'Service'
            ];
        });

        $trades = collect($user->trades()->get())->map(function ($trade) {
            return [
                'title' => $trade->trade_title,
                'created_at' => $trade->created_at,
                'type' => 'Trade'
            ];
        });

        $activities = $posts->merge($products)->merge($services)->merge($trades)->sortByDesc('created_at');

        return view('admin.users.profile', compact('user', 'activities', 'posts', 'products', 'services', 'trades'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit-user', compact('user'));
    }

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

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.list')->with('success', 'User deleted successfully!');
    }
}
