<?php

namespace App\Http\Controllers\Admin\Lists;

use App\Models\Trade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TradeControllerManagement extends Controller
{
    public function index()
    {
        $totalTradesInitiated = Trade::count();

        $user = Auth::user();
        $trades = Trade::get();

        return view('admin.lists.tradings', compact('totalTradesInitiated', 'user', 'trades'));
    }
}
