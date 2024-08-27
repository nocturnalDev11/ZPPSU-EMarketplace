<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
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
}
