<?php

namespace App\Policies;

use App\Models\CategoryOfWorkers;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class categoryPolicy
{
    use HandlesAuthorization;

    public function before(User $user , $permissions)
    {
        if($user->id == 1) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->permissions('categories.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryOfWorkers  $categoryOfWorkers
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CategoryOfWorkers $categoryOfWorkers)
    {
        return $user->permissions('categories.view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->permissions('categories.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryOfWorkers  $categoryOfWorkers
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CategoryOfWorkers $categoryOfWorkers)
    {
        return $user->permissions('categories.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryOfWorkers  $categoryOfWorkers
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CategoryOfWorkers $categoryOfWorkers)
    {
        return $user->permissions('categories.delete');
    }

    public function index(User $user, CategoryOfWorkers $categoryOfWorkers)
    {
        return true;
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\CategoryOfWorkers  $categoryOfWorkers
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function restore(User $user, CategoryOfWorkers $categoryOfWorkers)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\CategoryOfWorkers  $categoryOfWorkers
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function forceDelete(User $user, CategoryOfWorkers $categoryOfWorkers)
    // {
    //     //
    // }
}
