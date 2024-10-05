<?php

namespace App\Http\Controllers\Admin\Lists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Product;

class ProductControllerManagement extends Controller
{
    public function index()
    {
        $totalProductsAvailable = Product::where('prod_status', 'Available')->count();
        $totalProductsOS = Product::where('prod_status', 'Out of Stock')->count();
        $closed = Product::where('prod_status', 'Closed')->count();

        $user = Auth::user();
        $products = Product::all();

        $products->each(function ($product) {
            $product->created_at = Carbon::parse($product->created_at)->diffForHumans();
        });

        return view('admin.lists.products', compact(
            'totalProductsAvailable',
            'totalProductsOS',
            'closed',
            'user',
            'products'
        ));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.lists.products')->with('success', 'Product deleted successfully');
    }
}
