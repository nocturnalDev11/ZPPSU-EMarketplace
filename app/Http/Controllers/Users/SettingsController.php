<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class SettingsController extends Controller
{
    public function show($id = null)
    {
        if ($id) {
            $user = User::findOrFail($id);
        } else {
            $user = User::findOrFail(Auth::id());
        }

        return view('users.user-settings', compact('user'));
    }
}
