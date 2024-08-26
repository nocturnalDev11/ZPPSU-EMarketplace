<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Models\Trade;
use App\Models\Message;
use App\Models\Product;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Policies\UserProfilePolicy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Display a listing of the products on the home page
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        $services = Services::all();
        $post = Post::all();
        $trades = Trade::all();

        return view('user.home', compact('user', 'products','services', 'trades'));
    }
    // Display a specific user's profile
    public function profile($id = null)
    {
        $userId = $id ?? Auth::id();

        // Eager load the relationships if the user has them
        $user = User::with(['products', 'services', 'posts', 'trades'])
                    ->where('id', $userId)
                    ->first();

        if (!$user) {
            abort(404);
        }

        return view('user.profile', compact('user'));
    }

    // Define the messages relationship for messages received
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    // Define the messages relationship for messages sent
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

}
