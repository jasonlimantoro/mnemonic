<?php

namespace App\Policies;

use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
        return in_array('read', $user->permissibles('role'));
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		return in_array('create', $user->permissibles('role'));
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
		return in_array('update', $user->permissibles('role'));
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
		return in_array('delete', $user->permissibles('role'));
    }
}
