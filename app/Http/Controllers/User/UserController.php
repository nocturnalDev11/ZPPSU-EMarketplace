<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'university_id' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('users.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:255'],
            'dob' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'role' => ['nullable', 'string'],
            'department' => ['nullable', 'string', 'max:255'],
            'university_id' => ['nullable', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'suffix' => $data['suffix'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'department' => $data['department'],
            'university_id' => $data['university_id'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        Auth::login($user);

        return redirect($this->redirectTo);
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
}
