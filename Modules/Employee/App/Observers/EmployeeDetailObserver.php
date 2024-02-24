<?php

namespace App\Observers;

use App\Events\EmployeeDetailEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeeDetail;

class EmployeeDetailObserver
{
    /**
     * Dispatch events and log activities when the EmployeeDetail is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeDetail $data
     */
    protected function handleEventAndLogActivity(EmployeeDetail $data): void
    {
        EmployeeDetailEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeDetail "created" event.
     */
    public function created(EmployeeDetail $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeDetail "updated" event.
     */
    public function updated(EmployeeDetail $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeDetail "deleted" event.
     */
    public function deleted(EmployeeDetail $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeDetail "restored" event.
     */
    public function restored(EmployeeDetail $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeDetail "force deleted" event.
     */
    public function forceDeleted(EmployeeDetail $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
