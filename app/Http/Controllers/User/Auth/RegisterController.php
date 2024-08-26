<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/user/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'role' => ['required', 'string'],
            'department' => ['nullable', 'string', 'max:255'],
            'university_id' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
