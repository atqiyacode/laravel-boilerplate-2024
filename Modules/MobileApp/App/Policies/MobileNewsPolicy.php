<?php

namespace Modules\MobileApp\App\Policies;

use Modules\MobileApp\App\Models\MobileNews;
use Modules\MobileApp\App\Models\User;
use Illuminate\Auth\Access\Response;

class MobileNewsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MobileNews $mobileNews): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MobileNews $mobileNews): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MobileNews $mobileNews): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MobileNews $mobileNews): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MobileNews $mobileNews): bool
    {
        //
    }
}
