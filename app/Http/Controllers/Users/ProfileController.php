<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id = null)
    {
        Log::info('Requested User ID: ' . $id);

        if ($id) {
            $user = User::findOrFail($id);
        } else {
            $user = User::findOrFail(Auth::id());
        }

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

        return view('users.profile', compact('user', 'activities', 'posts', 'products', 'services', 'trades', 'postCount', 'productCount', 'serviceCount', 'tradeCount'));
    }

    public function edit($id = null)
    {
        if ($id) {
            $user = User::findOrFail($id);
        } else {
            $user = User::findOrFail(Auth::id());
        }

        return view('users.user-settings', compact('user'));
    }

    public function update(Request $request, $id = null)
    {
        $user = $id ? User::findOrFail($id) : Auth::user();

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

        $user->update($request->except(['role', 'department', 'university_id', 'profile_picture']));

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
    }

    public function updateProfilePicture(Request $request, $id = null)
    {
        $user = $id ? User::findOrFail($id) : Auth::user();

        $request->validate([
            'profile_picture' => 'nullable|image',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();
        }

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile picture updated successfully.');
    }
}
