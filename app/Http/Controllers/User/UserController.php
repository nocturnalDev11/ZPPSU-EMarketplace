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
            return redirect()->route('login')->with('success', 'Credentials sent successfully to your email!');
        }

        return redirect()->route('welcome')->with('error', 'No account found with the provided email or you are not part of the ZPPSU community.');
    }

    public function edit(User $user)
    {
        return view('users.user-settings', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'home_address' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->update($request->except(['password', 'profile_picture']));

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('all.users')->with('success', 'User updated successfully!');
    }
}
