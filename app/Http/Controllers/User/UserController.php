<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserCredentialsMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    protected $redirectTo = '/user/home';

    public function showLoginForm()
    {
        return view('users.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'university_id' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('university_id', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors([
            'university_id' => 'The university ID is not valid or you are not part of the ZPPSU community.',
        ]);
    }

    public function userMenu()
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

    public function sendCredentials(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            Mail::to($user->email)->send(new UserCredentialsMail($user));
            return redirect()->route('welcome')->with('success', 'Email sent successfully!');
        }

        return redirect()->route('welcome')->with('error', 'User not found!');
    }
}
