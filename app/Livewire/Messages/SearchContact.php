<?php

namespace App\Livewire\Messages;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SearchContact extends Component
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
            ->whereHas('receivedMessages', function ($query) {
                $query->where('sender_id', Auth::id());
            })
            ->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            })
            ->with(['sentMessages' => function ($query) {
                $query->where('recipient_id', Auth::id())->latest();
            }, 'receivedMessages' => function ($query) {
                $query->where('sender_id', Auth::id())->latest();
            }])
            ->get()
            ->map(function ($userItem) {
                $userItem->latestMessage = $userItem->sentMessages->merge($userItem->receivedMessages)->sortByDesc('created_at')->first();
                return $userItem;
            });

        return view('livewire.messages.search-contact', [
            'users' => $users,
        ]);
    }
}
