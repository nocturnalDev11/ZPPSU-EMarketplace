<?php

namespace App\Http\Controllers\Users\Layouts;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class NavController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $users = User::all();

            return view('users.layouts.nav', compact('user', 'users'));
        }

        return view('users.layouts.nav');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
