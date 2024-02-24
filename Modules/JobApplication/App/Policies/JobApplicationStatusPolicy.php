<?php

namespace Modules\JobApplication\App\Policies;

use Modules\JobApplication\App\Models\JobApplicationStatus;
use Modules\JobApplication\App\Models\User;
use Illuminate\Auth\Access\Response;

class JobApplicationStatusPolicy
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
    public function view(User $user, JobApplicationStatus $jobApplicationStatus): bool
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
    public function update(User $user, JobApplicationStatus $jobApplicationStatus): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobApplicationStatus $jobApplicationStatus): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobApplicationStatus $jobApplicationStatus): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobApplicationStatus $jobApplicationStatus): bool
    {
        //
    }
}
