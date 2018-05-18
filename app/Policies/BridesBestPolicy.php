<?php

namespace App\Policies;

use App\User;
use App\BridesBest;
use Illuminate\Auth\Access\HandlesAuthorization;

class BridesBestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the bridesBest.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
       return in_array('read', $user->permissibles('bridesmaid_bestman'));
    }

    /**
     * Determine whether the user can create bridesBests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		return in_array('create', $user->permissibles('bridesmaid_bestman'));
    }

    /**
     * Determine whether the user can update the bridesBest.
     *
     * @param  \App\User  $user
     * @param  \App\BridesBest  $bridesBest
     * @return mixed
     */
    public function update(User $user)
    {
		return in_array('update', $user->permissibles('bridesmaid_bestman'));
    }

    /**
     * Determine whether the user can delete the bridesBest.
     *
     * @param  \App\User  $user
     * @param  \App\BridesBest  $bridesBest
     * @return mixed
     */
    public function delete(User $user)
    {
		return in_array('delete', $user->permissibles('bridesmaid_bestman'));
    }
}
