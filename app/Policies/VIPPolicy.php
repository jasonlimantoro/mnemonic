<?php

namespace App\Policies;

use App\User;
use App\VIP;
use Illuminate\Auth\Access\HandlesAuthorization;

class VIPPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the vip.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
        return in_array('read', $user->permissibles('vip'));
    }


    /**
     * Determine whether the user can update the vip.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
		return in_array('update', $user->permissibles('vip'));
    }
}
