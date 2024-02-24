<?php

namespace App\Observers;

use App\Events\EmployeePermitRemainingEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeePermitRemaining;

class EmployeePermitRemainingObserver
{
    /**
     * Dispatch events and log activities when the EmployeePermitRemaining is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeePermitRemaining $data
     */
    protected function handleEventAndLogActivity(EmployeePermitRemaining $data): void
    {
        EmployeePermitRemainingEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeePermitRemaining "created" event.
     */
    public function created(EmployeePermitRemaining $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermitRemaining "updated" event.
     */
    public function updated(EmployeePermitRemaining $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermitRemaining "deleted" event.
     */
    public function deleted(EmployeePermitRemaining $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermitRemaining "restored" event.
     */
    public function restored(EmployeePermitRemaining $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermitRemaining "force deleted" event.
     */
    public function forceDeleted(EmployeePermitRemaining $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
