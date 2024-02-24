<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeePermitEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeePermit;

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
