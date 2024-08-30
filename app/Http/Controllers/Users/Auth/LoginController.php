<?php

namespace App\Http\Controllers\Users\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/user/home';

    public function showLoginForm()
    {
        return view('users.auth.login');
    }

    public function username()
    {
        return 'university_id';
    }

    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only($this->username(), 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors([
            $this->username() => 'The provided credentials do not match our records.',
        ]);
    }

}
