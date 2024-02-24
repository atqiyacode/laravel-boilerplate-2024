<?php

namespace App\Observers;

use App\Events\EmployeePermitEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeePermit;

class EmployeePermitObserver
{
    /**
     * Dispatch events and log activities when the EmployeePermit is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeePermit $data
     */
    protected function handleEventAndLogActivity(EmployeePermit $data): void
    {
        EmployeePermitEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeePermit "created" event.
     */
    public function created(EmployeePermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermit "updated" event.
     */
    public function updated(EmployeePermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermit "deleted" event.
     */
    public function deleted(EmployeePermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermit "restored" event.
     */
    public function restored(EmployeePermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermit "force deleted" event.
     */
    public function forceDeleted(EmployeePermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
