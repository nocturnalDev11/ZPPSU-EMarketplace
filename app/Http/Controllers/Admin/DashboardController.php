<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\Post;
use App\Models\Trade;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStudents = User::where('role', 'Student')->count();
        $totalFaculties = User::where('role', 'Faculty')->count();
        $totalStaff = User::where('role', 'Staff')->count();
        $totalProducts = Product::count();
        $totalServices = Service::count();
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
