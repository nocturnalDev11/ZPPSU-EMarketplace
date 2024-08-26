<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.profile', compact('user'));
    }
}
