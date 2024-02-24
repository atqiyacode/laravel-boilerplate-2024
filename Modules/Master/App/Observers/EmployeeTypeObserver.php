<?php

namespace Modules\Master\App\Observers;

use Modules\Master\App\Events\EmployeeTypeEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Master\App\Models\EmployeeType;

class EmployeeTypeObserver
{
    /**
     * Dispatch events and log activities when the EmployeeType is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeType $data
     */
    protected function handleEventAndLogActivity(EmployeeType $data): void
    {
        EmployeeTypeEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }

    /**
     * Handle the EmployeeType "created" event.
     *
     * @param \App\Models\EmployeeType $data
     */
    public function created(EmployeeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeType "updated" event.
     *
     * @param \App\Models\EmployeeType $data
     */
    public function updated(EmployeeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeType "deleted" event.
     *
     * @param \App\Models\EmployeeType $data
     */
    public function deleted(EmployeeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeType "restored" event.
     *
     * @param \App\Models\EmployeeType $data
     */
    public function restored(EmployeeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeType "force deleted" event.
     *
     * @param \App\Models\EmployeeType $data
     */
    public function forceDeleted(EmployeeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
