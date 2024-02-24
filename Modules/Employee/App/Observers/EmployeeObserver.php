<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\Employee;

class EmployeeObserver
{
    /**
     * Dispatch events and log activities when the Employee is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Employee $data
     */
    protected function handleEventAndLogActivity(Employee $data): void
    {
        EmployeeEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
