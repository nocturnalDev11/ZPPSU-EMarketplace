<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Product;
use App\Models\Services;
use App\Models\Trade;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        $services = Services::all();
        $trades = Trade::all();
        $posts = Post::all();

        return view('user.home', compact('user', 'products', 'services', 'trades', 'posts'));
    }
}
