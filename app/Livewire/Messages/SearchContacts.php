<?php

namespace App\Livewire\Messages;

use App\Models\User;
use Livewire\Component;

class SearchContacts extends Component
{
    public $search = '';
    public $searchResults = [];

    public function updatingSearch()
    {
        $this->searchResults = [];
    }

    public function render()
    {
        $users = User::query()
            ->where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.messages.search-contacts', [
            'users' => $users,
        ]);
    }
}
