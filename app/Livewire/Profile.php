<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $activeTab = 'products';
    public $user;

    public function mount($userId)
    {
        $this->user = User::find($userId);
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        $products = $this->user->products;

        return view('livewire.profile', [
            'user' => $this->user,
            'products' => $products,
        ]);
    }
}
