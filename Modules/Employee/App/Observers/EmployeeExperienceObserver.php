<?php

namespace App\Observers;

use App\Events\EmployeeExperienceEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeeExperience;

class EmployeeExperienceObserver
{
    /**
     * Dispatch events and log activities when the EmployeeExperience is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeExperience $data
     */
    protected function handleEventAndLogActivity(EmployeeExperience $data): void
    {
        EmployeeExperienceEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeExperience "created" event.
     */
    public function created(EmployeeExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeExperience "updated" event.
     */
    public function updated(EmployeeExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeExperience "deleted" event.
     */
    public function deleted(EmployeeExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeExperience "restored" event.
     */
    public function restored(EmployeeExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeExperience "force deleted" event.
     */
    public function forceDeleted(EmployeeExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
