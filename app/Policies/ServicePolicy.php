<?php

namespace App\Policies;

use App\Models\Services;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ServicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Services $service)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->can('create-service')
        ? Response::allow()
        : Response::deny('You do not have permission to create service.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Services $service)
    {
        return $user->id === $service->user_id
            ? Response::allow()
            : Response::deny('You do not have permission to update this service.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Services $service)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Services $service)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Services $service)
    {
        //
    }
}
