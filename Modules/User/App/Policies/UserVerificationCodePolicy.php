<?php

namespace Modules\User\App\Policies;

use Modules\User\App\Models\User;
use Modules\User\App\Models\UserVerificationCode;
use Illuminate\Auth\Access\Response;

class UserVerificationCodePolicy
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
    public function view(User $user, UserVerificationCode $userVerificationCode): bool
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
    public function update(User $user, UserVerificationCode $userVerificationCode): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserVerificationCode $userVerificationCode): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserVerificationCode $userVerificationCode): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserVerificationCode $userVerificationCode): bool
    {
        //
    }
}
