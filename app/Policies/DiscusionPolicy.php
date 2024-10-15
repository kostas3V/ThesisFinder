<?php

namespace App\Policies;

use App\Discusion;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscusionPolicy
{
    use HandlesAuthorization;


    public function before($user, $ability) {
        if ($user->role === 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discusion  $discusion
     * @return mixed
     */
    public function view(User $user, Discusion $discusion)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id === $discusion->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discusion  $discusion
     * @return mixed
     */
    public function update(User $user, Discusion $discusion)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discusion  $discusion
     * @return mixed
     */
    public function delete(User $user, Discusion $discusion)
    {
        return $user->id === $discusion->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discusion  $discusion
     * @return mixed
     */
    public function restore(User $user, Discusion $discusion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Discusion  $discusion
     * @return mixed
     */
    public function forceDelete(User $user, Discusion $discusion)
    {
        //
    }
}
