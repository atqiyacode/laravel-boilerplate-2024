<?php

namespace Modules\DynamicForm\App\Observers;

use Modules\DynamicForm\App\Events\PerformanceAssessmentEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\DynamicForm\App\Models\PerformanceAssessment;

class PerformanceAssessmentObserver
{
    /**
     * Dispatch events and log activities when the PerformanceAssessment is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\PerformanceAssessment $data
     */
    protected function handleEventAndLogActivity(PerformanceAssessment $data): void
    {
        PerformanceAssessmentEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the PerformanceAssessment "created" event.
     */
    public function created(PerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PerformanceAssessment "updated" event.
     */
    public function updated(PerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PerformanceAssessment "deleted" event.
     */
    public function deleted(PerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PerformanceAssessment "restored" event.
     */
    public function restored(PerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PerformanceAssessment "force deleted" event.
     */
    public function forceDeleted(PerformanceAssessment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
