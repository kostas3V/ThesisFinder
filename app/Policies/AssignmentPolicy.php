<?php

namespace App\Policies;

use App\Assignment;
use App\User;
use App\Thesis;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentPolicy
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
    public function viewAny(User $user)                             //User $user, Thesis $thesis
    {
        //return $thesis->user->id === $assignment->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function view(User $user, Assignment $assignment)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function update(User $user, Assignment $assignment)
    {
        //return $user->id === $assignment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function delete(User $user, Assignment $assignment)
    {
        //return $user->id === $assignment->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function restore(User $user, Assignment $assignment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function forceDelete(User $user, Assignment $assignment)
    {
        //
    }
}
