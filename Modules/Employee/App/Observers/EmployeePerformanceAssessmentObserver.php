<?php

namespace App\Observers;

use App\Events\EmployeePerformanceAssessmentEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeePerformanceAssessment;

class EmployeePerformanceAssessmentObserver
{
    /**
     * Dispatch events and log activities when the EmployeePerformanceAssessment is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeePerformanceAssessment $data
     */
    protected function handleEventAndLogActivity(EmployeePerformanceAssessment $data): void
    {
        EmployeePerformanceAssessmentEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeePerformanceAssessment "created" event.
     */
    public function created(EmployeePerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePerformanceAssessment "updated" event.
     */
    public function updated(EmployeePerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePerformanceAssessment "deleted" event.
     */
    public function deleted(EmployeePerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePerformanceAssessment "restored" event.
     */
    public function restored(EmployeePerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePerformanceAssessment "force deleted" event.
     */
    public function forceDeleted(EmployeePerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
