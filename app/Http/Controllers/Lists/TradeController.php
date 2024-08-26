<?php

namespace App\Http\Controllers\Lists;

use App\Models\Trade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TradeController extends Controller
{
    // Store a newly created trade in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trade_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'trade_title' => 'required|string|max:255',
            'trade_category' => 'required|string|max:255',
            'trade_description' => 'required|string|max:65535',
            'trade_status' => 'required|string',
            'trade_type' => 'required|string',
            'trade_value' => 'nullable|numeric',
            'trade_conditions' => 'nullable|string|max:65535',
            'trade_duration' => 'nullable|date'
        ]);

        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('trade_picture')) {
            $path = $request->file('trade_picture')->store('trade_pictures', 'public');
            $validatedData['trade_picture'] = $path;
        }

        Trade::create($validatedData);
        return redirect()->route('lists.trades.index');
    }

    // Display a list of all posts
    public function index()
    {
        $user = Auth::user();
        $trades = Trade::get();
        return view('lists.trades.index', compact('user', 'trades'));
    }

    // Show a specific trade
    public function show($id)
    {
        $trade = Trade::findOrFail($id);
        $user = Auth::user();
        $trades = Trade::where('user_id', $trade->user_id)
                            ->where('id', '!=', $trade->id)
                            ->get();
        $relatedTrades = Trade::where('trade_category', $trade->trade_category)
                            ->where('id', '!=', $trade->id)
                            ->get();

        return view('lists.trades.details', compact('trade', 'trades', 'relatedTrades', 'user'));
    }

    // Delete a specific trade list
    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);

        if (Auth::id() === $trade->user_id) {
            $trade->delete();
            return redirect()->route('lists.trades.index')->with('success', 'Trade list deleted successfully');
        }

        return redirect()->route('user.home')->with('error', 'You are not authorized to delete this trade list');
    }

    // Show the form for editing a specific trade list
    public function edit($id)
    {
        $trade = Trade::findOrFail($id);
        if (Auth::id() !== $trade->user_id) {
            return redirect()->route('user.home')->with('error', 'You are not authorized to edit this trade list');
        }
        return view('lists.trades.edit', compact('trade'));
    }

    // Update a specific trade
    public function update(Request $request, $id)
    {
        $trade = Trade::findOrFail($id);

        if (Auth::id() !== $trade->user_id) {
            return redirect()->route('user.home')->with('error', 'You are not authorized to update this service');
        }

        $validatedData = $request->validate([
            'trade_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'trade_title' => 'required|string|max:255',
            'trade_category' => 'required|string|max:255',
            'trade_description' => 'required|string|max:65535',
            'trade_status' => 'required|string',
            'trade_type' => 'required|string',
            'trade_value' => 'nullable|numeric',
            'trade_conditions' => 'nullable|string|max:65535',
            'trade_duration' => 'nullable|date'
        ]);

        if ($request->hasFile('trade_picture')) {
            $path = $request->file('trade_picture')->store('trade_pictures', 'public');
            $validatedData['trade_picture'] = $path;
        }

        $tradeDescription = $validatedData['trade_description'];
        if (strlen($tradeDescription) > 65535) {
            $validatedData['trade_description'] = substr($tradeDescription, 0, 65535);
        }

        $trade->update($validatedData);

        return redirect()->route('trades.show', $trade->id)->with('success', 'Trade list updated successfully');
    }
}
