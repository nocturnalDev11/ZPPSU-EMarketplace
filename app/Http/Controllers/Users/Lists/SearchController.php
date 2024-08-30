<?php

namespace App\Http\Controllers\Users\Lists;

use App\Models\Post;
use App\Models\Trade;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return response()->json([]);
        }

        $posts = Post::where('post_title', 'like', "%{$query}%")->get();
        $products = Product::where('prod_name', 'like', "%{$query}%")->get();
        $services = Service::where('services_title', 'like', "%{$query}%")->get();
        $trades = Trade::where('trade_title', 'like', "%{$query}%")->get();

        $results = [];

        foreach ($posts as $post) {
            $results[] = [
                'id' => $post->id,
                'title' => $post->post_title,
                'description' => $post->post_content,
                'url' => route('posts.show', ['post' => $post->id]),
            ];
        }

        foreach ($products as $product) {
            $results[] = [
                'id' => $product->id,
                'title' => $product->prod_name,
                'description' => $product->prod_description,
                'url' => route('products.show', ['product' => $product->id]),
            ];
        }

        foreach ($services as $service) {
            $results[] = [
                'id' => $service->id,
                'title' => $service->services_title,
                'description' => $service->services_description,
                'url' => route('services.show', ['service' => $service->id]),
            ];
        }

        foreach ($trades as $trade) {
            $results[] = [
                'id' => $trade->id,
                'title' => $trade->trade_title,
                'description' => $trade->trade_description,
                'url' => route('trades.show', ['trade' => $trade->id]),
            ];
        }

        return response()->json($results);
    }
}
