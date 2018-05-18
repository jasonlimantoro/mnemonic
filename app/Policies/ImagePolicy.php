<?php

namespace App\Policies;

use App\User;
use App\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the image.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
        return in_array('read', $user->permissibles('gallery'));
    }

    /**
     * Determine whether the user can create images.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array('create', $user->permissibles('gallery'));
    }

    /**
     * Determine whether the user can update the image.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return in_array('update', $user->permissibles('gallery'));
    }

    /**
     * Determine whether the user can delete the image.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return in_array('delete', $user->permissibles('gallery'));
    }
}
