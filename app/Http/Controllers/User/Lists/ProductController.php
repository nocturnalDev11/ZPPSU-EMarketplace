<?php

namespace App\Http\Controllers\User\Lists;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prod_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'prod_name' => 'required|string|max:255',
            'prod_price' => 'required|numeric',
            'prod_category' => 'required|string',
            'prod_condition' => 'required|string',
            'prod_description' => 'required|string|max:65535',
        ]);

        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('prod_picture')) {
            $path = $request->file('prod_picture')->store('product_pictures', 'public');
            $validatedData['prod_picture'] = $path;
        }

        Product::create($validatedData);
        return redirect()->route('lists.products.index');
    }

    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        $products->each(function ($products) {
            $products->created_at = Carbon::parse($products->created_at)->diffForHumans();
        });
        return view('users.lists.products.index', compact('user','products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        $products = Product::where('user_id', $product->user_id)
                            ->where('id', '!=', $product->id)
                            ->get();
        $relatedProducts = Product::where('prod_category', $product->prod_category)
                            ->where('id', '!=', $product->id)
                            ->get();

        return view('users.lists.products.details', compact('product', 'products', 'user', 'relatedProducts'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (Auth::id() === $product->user_id) {
            $product->delete();
            return redirect()->route('users.lists.products.index')->with('success', 'Product list deleted successfully');
        }

        return redirect()->route('users.home')->with('error', 'You are not authorized to delete this product list');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        if (Auth::id() !== $product->user_id) {
            return redirect()->route('users.home')->with('error', 'You are not authorized to edit this product list');
        }
        return view('users.lists.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if (Auth::id() !== $product->user_id) {
            return redirect()->route('users.home')->with('error', 'You are not authorized to update this product');
        }

        $validatedData = $request->validate([
            'prod_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'prod_name' => 'required|string|max:255',
            'prod_price' => 'required|numeric',
            'prod_category' => 'required|string',
            'prod_condition' => 'required|string',
            'prod_description' => 'required|string|max:65535',
        ]);

        if ($request->hasFile('prod_picture')) {
            $path = $request->file('prod_picture')->store('product_pictures', 'public');
            $validatedData['prod_picture'] = $path;
        }

        $prodDescription = $validatedData['prod_description'];
        if (strlen($prodDescription) > 65535) {
            $validatedData['prod_description'] = substr($prodDescription, 0, 65535);
        }

        $product->update($validatedData);

        return redirect()->route('products.show', $product->id)->with('success', 'Product list updated successfully');
    }
}
