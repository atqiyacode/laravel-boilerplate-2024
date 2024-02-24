<?php

namespace Modules\Notification\App\Policies;

use Modules\Notification\App\Models\TemplateNotification;
use Modules\Notification\App\Models\User;
use Illuminate\Auth\Access\Response;

class TemplateNotificationPolicy
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
    public function view(User $user, TemplateNotification $templateNotification): bool
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
    public function update(User $user, TemplateNotification $templateNotification): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TemplateNotification $templateNotification): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TemplateNotification $templateNotification): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TemplateNotification $templateNotification): bool
    {
        //
    }
}
