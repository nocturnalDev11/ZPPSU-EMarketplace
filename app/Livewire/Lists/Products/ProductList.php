<?php

namespace App\Livewire\Lists\Products;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $search = '';
    public $sortBy = 'latest';
    public $selectedCategories = [];

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('prod_name', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('prod_category', $this->selectedCategories);
        }

        if ($this->sortBy === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($this->sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $products = $query->get();

        return view('livewire.lists.products.product-list', [
            'products' => $products,
        ]);
    }

    public function setSort($sortBy)
    {
        $this->sortBy = $sortBy;
    }
}
