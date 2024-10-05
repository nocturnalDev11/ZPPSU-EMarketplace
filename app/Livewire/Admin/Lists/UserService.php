<?php

namespace App\Livewire\Admin\Lists;

use App\Models\Service;
use Livewire\Component;

class UserService extends Component
{
    public $search = '';
    public $sortBy = 'latest';
    public $selectedCategories = [];

    public function render()
    {
        $query = Service::query();

        if ($this->search) {
            $query->where('services_title', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('services_category', $this->selectedCategories);
        }

        if ($this->sortBy === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($this->sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $services = $query->get();

        return view('livewire.admin.lists.user-service', [
            'services' => $services,
        ]);
    }

    public function setSort($sortBy)
    {
        $this->sortBy = $sortBy;
    }
}
