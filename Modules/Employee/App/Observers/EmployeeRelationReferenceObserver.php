<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeRelationReferenceEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeRelationReference;

class EmployeeRelationReferenceObserver
{
    /**
     * Dispatch events and log activities when the EmployeeRelationReference is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeRelationReference $data
     */
    protected function handleEventAndLogActivity(EmployeeRelationReference $data): void
    {
        EmployeeRelationReferenceEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeRelationReference "created" event.
     */
    public function created(EmployeeRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeRelationReference "updated" event.
     */
    public function updated(EmployeeRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeRelationReference "deleted" event.
     */
    public function deleted(EmployeeRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeRelationReference "restored" event.
     */
    public function restored(EmployeeRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeRelationReference "force deleted" event.
     */
    public function forceDeleted(EmployeeRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
