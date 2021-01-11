<?php

namespace App\Policies;

use App\Models\User;
use App\Models\projects;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAbleTo('projects.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\projects  $projects
     * @return mixed
     */
    public function view(User $user, projects $projects)
    {
        return true;
        return $user->isAbleTo('projects.show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAbleTo('projects.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\projects  $projects
     * @return mixed
     */
    public function update(User $user, projects $projects)
    {
        return $user->isAbleTo('projects.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\projects  $projects
     * @return mixed
     */
    public function delete(User $user, projects $projects)
    {
        return $user->isAbleTo('projects.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\projects  $projects
     * @return mixed
     */
    public function restore(User $user, projects $projects)
    {
        return $user->isAbleTo('projects.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\projects  $projects
     * @return mixed
     */
    public function forceDelete(User $user, projects $projects)
    {
        return $user->isAbleTo('projects.forceDelete');
    }
}