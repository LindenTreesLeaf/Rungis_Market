<?php

namespace App\Policies;

use App\Models\Bundle;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BundlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Bundle $bundle): bool
    {
        return $user->bundles->contains($bundle->user_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create bundle');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Bundle $bundle): bool
    {
        return $user->can('edit bundle');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Bundle $bundle): bool
    {
        return $user->can('delete bundle');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Bundle $bundle): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Bundle $bundle): bool
    {
        return false;
    }

    public function before(User $user){
        if($user->hasRole('admin'))
            return true;
    }
}
