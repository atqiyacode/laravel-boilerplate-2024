<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeContactEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeContact;

class EmployeeContactObserver
{
    /**
     * Dispatch events and log activities when the EmployeeContact is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeContact $data
     */
    protected function handleEventAndLogActivity(EmployeeContact $data): void
    {
        EmployeeContactEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeContact "created" event.
     */
    public function created(EmployeeContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeContact "updated" event.
     */
    public function updated(EmployeeContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeContact "deleted" event.
     */
    public function deleted(EmployeeContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeContact "restored" event.
     */
    public function restored(EmployeeContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeContact "force deleted" event.
     */
    public function forceDeleted(EmployeeContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
