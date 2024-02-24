<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeActivityEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeActivity;

class EmployeeActivityObserver
{
    /**
     * Dispatch events and log activities when the EmployeeActivity is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeActivity $data
     */
    protected function handleEventAndLogActivity(EmployeeActivity $data): void
    {
        EmployeeActivityEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeActivity "created" event.
     */
    public function created(EmployeeActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeActivity "updated" event.
     */
    public function updated(EmployeeActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeActivity "deleted" event.
     */
    public function deleted(EmployeeActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeActivity "restored" event.
     */
    public function restored(EmployeeActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeActivity "force deleted" event.
     */
    public function forceDeleted(EmployeeActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
