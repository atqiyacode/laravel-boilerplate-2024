<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeEmergencyContactEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeEmergencyContact;

class EmployeeEmergencyContactObserver
{
    /**
     * Dispatch events and log activities when the EmployeeEmergencyContact is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeEmergencyContact $data
     */
    protected function handleEventAndLogActivity(EmployeeEmergencyContact $data): void
    {
        EmployeeEmergencyContactEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeEmergencyContact "created" event.
     */
    public function created(EmployeeEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeEmergencyContact "updated" event.
     */
    public function updated(EmployeeEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeEmergencyContact "deleted" event.
     */
    public function deleted(EmployeeEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeEmergencyContact "restored" event.
     */
    public function restored(EmployeeEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeEmergencyContact "force deleted" event.
     */
    public function forceDeleted(EmployeeEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
