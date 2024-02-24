<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeAttendanceEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeAttendance;

class EmployeeAttendanceObserver
{
    /**
     * Dispatch events and log activities when the EmployeeAttendance is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeAttendance $data
     */
    protected function handleEventAndLogActivity(EmployeeAttendance $data): void
    {
        EmployeeAttendanceEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeAttendance "created" event.
     */
    public function created(EmployeeAttendance $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeAttendance "updated" event.
     */
    public function updated(EmployeeAttendance $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeAttendance "deleted" event.
     */
    public function deleted(EmployeeAttendance $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeAttendance "restored" event.
     */
    public function restored(EmployeeAttendance $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeAttendance "force deleted" event.
     */
    public function forceDeleted(EmployeeAttendance $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
