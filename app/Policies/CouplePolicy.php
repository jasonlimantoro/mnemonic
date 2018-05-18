<?php

namespace App\Policies;

use App\User;
use App\Couple;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouplePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the couple.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
        return in_array('read', $user->permissibles('couple'));
    }


    /**
     * Determine whether the user can update the couple.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
		return in_array('update', $user->permissibles('couple'));
    }
}
