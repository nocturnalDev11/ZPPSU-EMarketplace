<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NavController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $users = User::all();

            return view('user.layouts.nav', compact('user', 'users'));
        }

        return view('user.layouts.nav');
    }
}
