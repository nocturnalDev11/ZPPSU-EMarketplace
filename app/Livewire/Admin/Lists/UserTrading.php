<?php

namespace App\Livewire\Admin\Lists;

use App\Models\Trade;
use Livewire\Component;

class UserTrading extends Component
{
    public $search = '';
    public $sortBy = 'latest';
    public $selectedCategories = [];
    public $selectedStatus = [];

    public function render()
    {
        $query = Trade::query();

        if ($this->search) {
            $query->where('trade_title', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('trade_category', $this->selectedCategories);
        }

        if (!empty($this->selectedStatus)) {
            $query->whereIn('trade_status', $this->selectedStatus);
        }

        if ($this->sortBy === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($this->sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $trades = $query->get();

        return view('livewire.admin.lists.user-trading', [
            'trades' => $trades,
        ]);
    }

    public function setSort($sortBy)
    {
        $this->sortBy = $sortBy;
    }
}
