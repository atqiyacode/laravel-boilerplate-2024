<?php

namespace Modules\Others\App\Policies;

use Modules\Others\App\Models\TermAndCondition;
use Modules\Others\App\Models\User;
use Illuminate\Auth\Access\Response;

class TermAndConditionPolicy
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
    public function view(User $user, TermAndCondition $termAndCondition): bool
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
    public function update(User $user, TermAndCondition $termAndCondition): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TermAndCondition $termAndCondition): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TermAndCondition $termAndCondition): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TermAndCondition $termAndCondition): bool
    {
        //
    }
}
