<?php

namespace App\Livewire\Lists\Posts;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public $search = '';
    public $sortBy = 'latest';
    public $selectedTypes = [];

    public function render()
    {
        $query = Post::query();

        if ($this->search) {
            $query->where('post_title', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->selectedTypes)) {
            $query->whereIn('post_list_type', $this->selectedTypes);
        }

        if ($this->sortBy === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($this->sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $posts = $query->get();

        return view('livewire.lists.posts.post-list', [
            'posts' => $posts,
        ]);
    }

    public function setSort($sortBy)
    {
        $this->sortBy = $sortBy;
    }
}
