<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Services;
use App\Models\Post;
use App\Models\Trade;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStudents = User::where('role', 'Student')->count();
        $totalFaculties = User::where('role', 'Faculty')->count();
        $totalStaff = User::where('role', 'Staff')->count();
        $totalProducts = Product::count();
        $totalServices = Services::count();
        $totalPosts = Post::count();
        $totalTrades = Trade::count();
        $users = User::all();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalStudents', 'totalFaculties', 'totalStaff',
            'totalProducts', 'totalServices', 'totalPosts', 'totalTrades',
            'users'
        ));
    }
}
