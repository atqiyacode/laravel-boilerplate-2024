<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeContractEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeContract;

class EmployeeContractObserver
{
    /**
     * Dispatch events and log activities when the EmployeeContract is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeContract $data
     */
    protected function handleEventAndLogActivity(EmployeeContract $data): void
    {
        EmployeeContractEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeContract "created" event.
     */
    public function created(EmployeeContract $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeContract "updated" event.
     */
    public function updated(EmployeeContract $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeContract "deleted" event.
     */
    public function deleted(EmployeeContract $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeContract "restored" event.
     */
    public function restored(EmployeeContract $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeContract "force deleted" event.
     */
    public function forceDeleted(EmployeeContract $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
