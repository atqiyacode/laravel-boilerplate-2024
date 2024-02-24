<?php

namespace Modules\DynamicForm\App\Policies;

use Modules\DynamicForm\App\Models\FormPraRegistration;
use Modules\DynamicForm\App\Models\User;
use Illuminate\Auth\Access\Response;

class FormPraRegistrationPolicy
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
    public function view(User $user, FormPraRegistration $formPraRegistration): bool
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
    public function update(User $user, FormPraRegistration $formPraRegistration): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FormPraRegistration $formPraRegistration): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FormPraRegistration $formPraRegistration): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FormPraRegistration $formPraRegistration): bool
    {
        //
    }
}
