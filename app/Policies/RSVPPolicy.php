<?php

namespace App\Policies;

use App\User;
use App\RSVP;
use Illuminate\Auth\Access\HandlesAuthorization;

class RSVPPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the rSVP.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
		return in_array('read', $user->permissibles('rsvp'));
    }

    /**
     * Determine whether the user can create rSVPs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		return in_array('create', $user->permissibles('rsvp'));
    }

    /**
     * Determine whether the user can update the rSVP.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
		return in_array('update', $user->permissibles('rsvp'));
    }

    /**
     * Determine whether the user can delete the rSVP.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
		return in_array('delete', $user->permissibles('rsvp'));
    }
}
