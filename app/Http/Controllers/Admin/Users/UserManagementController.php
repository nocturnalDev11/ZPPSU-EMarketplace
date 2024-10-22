<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\UniversityRecord;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStudents = User::where('role', 'Student')->count();
        $totalFaculties = User::where('role', 'Faculty')->count();
        $totalStaff = User::where('role', 'Staff')->count();
        $users = User::all();
        return view('admin.users.all-users', compact(
            'users',
            'totalUsers',
            'totalStudents',
            'totalFaculties',
            'totalStaff'
        ));
    }

    public function create()
    {
        return view('admin.users.create-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'university_id' => 'required|string|max:255|unique:users,university_id',
            'username' => 'required|string|max:255|unique:users,username',
            'contact_number' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'home_address' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User($request->except(['password']));
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('all.users')->with('success', 'User created successfully!');
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

        return view('admin.users.view-user', compact('user', 'activities', 'posts', 'products', 'services', 'trades'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
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

        return redirect()->route('all.users')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('all.users')->with('success', 'User deleted successfully!');
    }
}
