<?php

namespace App\Livewire\Users;

use Livewire\Component;

class UserMenu extends Component
{
    public $isOpen = false;

    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.users.user-menu');
    }
}
