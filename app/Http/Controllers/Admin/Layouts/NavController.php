<?php

namespace App\Http\Controllers\Admin\Layouts;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NavController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user(); // Get the authenticated admin
            $admins = Admin::all(); // Get all admins if needed

            return view('admin.layouts.dashboard-nav', compact('admin', 'admins'));
        }
    }
}
