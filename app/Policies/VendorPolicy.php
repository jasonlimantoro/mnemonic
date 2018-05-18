<?php

namespace App\Policies;

use App\User;
use App\Vendor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the vendor.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
		return in_array('read', $user->permissibles('vendor'));
    }

    /**
     * Determine whether the user can create vendors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		return in_array('create', $user->permissibles('vendor'));
    }

    /**
     * Determine whether the user can update the vendor.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
		return in_array('update', $user->permissibles('vendor'));
    }

    /**
     * Determine whether the user can delete the vendor.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
		return in_array('delete', $user->permissibles('vendor'));
    }
}
