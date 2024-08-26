<?php

namespace App\Http\Controllers\Lists;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        $validatedData['user_id'] = auth()->id();

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
        return view('lists.products.index', compact('products'));
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

        return view('lists.products.details', compact('product', 'products', 'user', 'relatedProducts'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (Auth::id() === $product->user_id) {
            $product->delete();
            return redirect()->route('lists.products.index')->with('success', 'Product list deleted successfully');
        }

        return redirect()->route('user.home')->with('error', 'You are not authorized to delete this product list');
    }

    // Show the form for editing a specific product
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        if (Auth::id() !== $product->user_id) {
            return redirect()->route('user.home')->with('error', 'You are not authorized to edit this product list');
        }
        return view('lists.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if (Auth::id() !== $product->user_id) {
            return redirect()->route('user.home')->with('error', 'You are not authorized to update this product');
        }

        $validatedData = $request->validate([
            'prod_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'prod_name' => 'required|string|max:255',
            'prod_price' => 'required|numeric',
            'prod_category' => 'required|string',
            'prod_condition' => 'required|string',
            'prod_description' => 'required|string|max:65535',
        ]);

        // Handle product picture upload
        if ($request->hasFile('prod_picture')) {
            $path = $request->file('prod_picture')->store('product_pictures', 'public');
            $validatedData['prod_picture'] = $path;
        }

        // Truncate content if necessary
        $prodDescription = $validatedData['prod_description'];
        if (strlen($prodDescription) > 65535) {
            $validatedData['prod_description'] = substr($prodDescription, 0, 65535);
        }

        // Update the product with validated data
        $product->update($validatedData);

        return redirect()->route('products.show', $product->id)->with('success', 'Product list updated successfully');
    }
}
