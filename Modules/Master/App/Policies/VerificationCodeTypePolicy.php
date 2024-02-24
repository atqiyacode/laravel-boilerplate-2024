<?php

namespace Modules\Master\App\Policies;

use Modules\Master\App\Models\User;
use Modules\Master\App\Models\VerificationCodeType;
use Illuminate\Auth\Access\Response;

class VerificationCodeTypePolicy
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
    public function view(User $user, VerificationCodeType $verificationCodeType): bool
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
    public function update(User $user, VerificationCodeType $verificationCodeType): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, VerificationCodeType $verificationCodeType): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, VerificationCodeType $verificationCodeType): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, VerificationCodeType $verificationCodeType): bool
    {
        //
    }
}
