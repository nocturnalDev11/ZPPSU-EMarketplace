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

    public function show($id)
    {
        $trade = Trade::findOrFail($id);
        $user = Auth::user();

        $trades = Trade::where('user_id', $trade->user_id)
            ->where('id', '!=', $trade->id)
            ->get();

        return view('admin.lists.tradings', compact(
            'trade',
            'trades',
            'user'
        ));
    }

    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);
        $trade->delete();

        return redirect()->route('trades')->with('success', 'Service deleted successfully');
    }
}
