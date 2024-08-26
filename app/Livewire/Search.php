<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Product;
use App\Models\Services;
use App\Models\Trade;

class Search extends Component
{
    public $query = '';
    public $results = [];

    public function updatedQuery()
    {
        $this->results = $this->search($this->query);
    }

    public function search($query)
    {
        $results = [];

        if ($query) {
            // Search logic
            $posts = Post::where('post_title', 'like', "%{$query}%")->get();
            $products = Product::where('prod_name', 'like', "%{$query}%")->get();
            $services = Services::where('services_title', 'like', "%{$query}%")->get();
            $trades = Trade::where('trade_title', 'like', "%{$query}%")->get();

            // Combine results
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
        }

        return $results;
    }

    public function render()
    {
        return view('livewire.search');
    }
}
