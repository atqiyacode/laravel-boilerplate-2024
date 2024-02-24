<?php

namespace App\Observers;

use App\Events\EmployeePermitStructureEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeePermitStructure;

class EmployeePermitStructureObserver
{
    /**
     * Dispatch events and log activities when the EmployeePermitStructure is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeePermitStructure $data
     */
    protected function handleEventAndLogActivity(EmployeePermitStructure $data): void
    {
        EmployeePermitStructureEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeePermitStructure "created" event.
     */
    public function created(EmployeePermitStructure $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermitStructure "updated" event.
     */
    public function updated(EmployeePermitStructure $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermitStructure "deleted" event.
     */
    public function deleted(EmployeePermitStructure $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermitStructure "restored" event.
     */
    public function restored(EmployeePermitStructure $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeePermitStructure "force deleted" event.
     */
    public function forceDeleted(EmployeePermitStructure $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
