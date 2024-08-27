<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function show($id = null)
    {
        // Log the incoming user ID for debugging
        Log::info('Requested User ID: ' . $id);

        // Check if a user ID is provided
        if ($id) {
            // Fetch the user with the provided ID
            $user = User::findOrFail($id);
        } else {
            // Fetch the currently authenticated user's details if no ID is provided
            $user = User::findOrFail(Auth::id());
        }

        // Load the user's activities
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

        $postCount = $posts->count();
        $productCount = $products->count();
        $serviceCount = $services->count();
        $tradeCount = $trades->count();

        $activities = $posts->merge($products)->merge($services)->merge($trades)->sortByDesc('created_at');

        return view('user.profile', compact('user', 'activities', 'posts', 'products', 'services', 'trades', 'postCount', 'productCount', 'serviceCount', 'tradeCount'));
    }

    public function edit($id = null)
    {
        // Check if a user ID is provided
        if ($id) {
            // Fetch the user with the provided ID
            $user = User::findOrFail($id);
        } else {
            // Fetch the currently authenticated user's details if no ID is provided
            $user = User::findOrFail(Auth::id());
        }

        // Return the view with the user details
        return view('user.settings.edit', compact('user'));
    }

    public function update(Request $request, $id = null)
    {
        // Fetch the currently authenticated user's details if no ID is provided
        $user = $id ? User::findOrFail($id) : Auth::user();

        // Validate the request, excluding 'role', 'department', 'university_id', and 'profile_picture'
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string|max:255',
            'about' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'home_address' => 'nullable|string|max:255',
        ]);

        // Update the user details, excluding 'role', 'department', 'university_id'
        $user->update($request->except(['role', 'department', 'university_id', 'profile_picture']));

        // Redirect back to the profile page with a success message
        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
    }

    public function updateProfilePicture(Request $request, $id = null)
    {
        // Fetch the currently authenticated user's details if no ID is provided
        $user = $id ? User::findOrFail($id) : Auth::user();

        // Validate the profile picture
        $request->validate([
            'profile_picture' => 'nullable|image',
        ]);

        // Check if a new profile picture is uploaded
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();
        }

        // Redirect back to the profile page with a success message
        return redirect()->route('profile.show', $user->id)->with('success', 'Profile picture updated successfully.');
    }

}

