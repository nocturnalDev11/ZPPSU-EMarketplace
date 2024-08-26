<?php

namespace App\Policies;

use App\Models\Trade;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TradePolicy
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
    public function view(User $user, Trade $trade)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->can('create-trade')
        ? Response::allow()
        : Response::deny('You do not have permission to create trade.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Trade $trade)
    {
        return $user->id === $trade->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Trade $trade)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Trade $trade)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Trade $trade)
    {
        //
    }
}
