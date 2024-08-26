<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function show($id = null)
    {
        if ($id) {
            $user = User::findOrFail($id);
        } else {
            $user = User::findOrFail(Auth::id());
        }

        return view('user.settings.user-settings', compact('user'));
    }
}
