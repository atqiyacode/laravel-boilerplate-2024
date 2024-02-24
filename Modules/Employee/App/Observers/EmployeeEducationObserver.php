<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeEducationEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeEducation;

class EmployeeEducationObserver
{
    /**
     * Dispatch events and log activities when the EmployeeEducation is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeEducation $data
     */
    protected function handleEventAndLogActivity(EmployeeEducation $data): void
    {
        EmployeeEducationEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeEducation "created" event.
     */
    public function created(EmployeeEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeEducation "updated" event.
     */
    public function updated(EmployeeEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeEducation "deleted" event.
     */
    public function deleted(EmployeeEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeEducation "restored" event.
     */
    public function restored(EmployeeEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeEducation "force deleted" event.
     */
    public function forceDeleted(EmployeeEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
