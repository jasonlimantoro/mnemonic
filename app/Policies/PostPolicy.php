<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can read the post.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function read(User $user)
    {
        return in_array('read', $user->permissibles('post'));
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
	public function create(User $user)
    {
		return in_array('create', $user->permissibles('post'));
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
		return in_array('update', $user->permissibles('post')); 
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return in_array('delete', $user->permissibles('post'));
    }
}
