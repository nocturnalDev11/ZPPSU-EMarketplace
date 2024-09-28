<?php

namespace App\Livewire\Admin\Lists;

use Livewire\Component;
use App\Models\Product;

class UserProduct extends Component
{
    public $search = '';
    public $sortBy = 'latest';
    public $selectedCategories = [];
    public $status = [];

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('prod_name', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('prod_category', $this->selectedCategories);
        }

        if (!empty($this->status)) {
            $query->whereIn('prod_status', $this->status);
        }

        if ($this->sortBy === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($this->sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $products = $query->get();

        return view('livewire.admin.lists.user-product', [
            'products' => $products,
        ]);
    }

    public function setSort($sortBy)
    {
        $this->sortBy = $sortBy;
    }
}
