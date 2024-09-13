<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\Trade;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        $services = Service::all();
        $trades = Trade::all();
        $posts = Post::all();

        return view('users.home', compact('user', 'products', 'services', 'trades', 'posts'));
    }
}
