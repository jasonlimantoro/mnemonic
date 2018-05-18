<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
        return in_array('read', $user->permissibles('vendor_categories'));
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		return in_array('create', $user->permissibles('vendor_categories'));
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
		return in_array('update', $user->permissibles('vendor_categories'));
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
		return in_array('delete', $user->permissibles('vendor_categories'));
    }
}
