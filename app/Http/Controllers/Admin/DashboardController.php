<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStudents = User::where('role', 'Student')->count();
        $totalFaculties = User::where('role', 'Faculty')->count();
        $totalStaff = User::where('role', 'Staff')->count();
        // $totalProducts = Product::count();
        // $totalServices = Service::count();
        // $totalPosts = Post::count();
        // $totalTrades = Trade::count();
        $users = User::all();

        return view('admin.dashboard', compact(
            'totalUsers',
            // 'totalStudents',
            // 'totalFaculties',
            // 'totalStaff',
            // 'totalProducts',
            // 'totalServices',
            // 'totalPosts',
            // 'totalTrades',
            'users'
        ));
    }
}
