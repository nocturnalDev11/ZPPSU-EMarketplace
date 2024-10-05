<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public $search = '';
    public $selectedDepartment = [];
    public $selectedRole = [];
    public $selectedGender = [];

    public function render()
    {
        $query = User::query();

        if ($this->search) {
            $query->where(function ($subquery) {
                $subquery->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->selectedDepartment)) {
            $query->whereIn('department', $this->selectedDepartment);
        }

        if (!empty($this->selectedRole)) {
            $query->whereIn('role', $this->selectedRole);
        }

        if (!empty($this->selectedGender)) {
            $query->whereIn('gender', $this->selectedGender);
        }

        $users = $query->get();

        return view('livewire.admin.users.user-list', [
            'users' => $users,
        ]);
    }
}
