<?php

namespace App\Http\Controllers\Admin\Layouts;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class NavController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            $admins = Admin::all();

            return view('admin.layouts.dashboard-nav', compact('admin', 'admins'));
        }
    }
}
