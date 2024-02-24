<?php

namespace Modules\KeyPerformanceIndicator\Policies;

use Modules\KeyPerformanceIndicator\Models\PerformanceAssessment;
use Modules\KeyPerformanceIndicator\Models\User;
use Illuminate\Auth\Access\Response;

class PerformanceAssessmentPolicy
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
    public function view(User $user, PerformanceAssessment $performanceAssessment): bool
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
    public function update(User $user, PerformanceAssessment $performanceAssessment): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PerformanceAssessment $performanceAssessment): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PerformanceAssessment $performanceAssessment): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PerformanceAssessment $performanceAssessment): bool
    {
        //
    }
}
