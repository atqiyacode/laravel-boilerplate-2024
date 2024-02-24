<?php

namespace Modules\HRMaster\App\Observers;

use Modules\HRMaster\App\Events\TypeOfPermitEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\HRMaster\App\Models\TypeOfPermit;

class TypeOfPermitObserver
{
    /**
     * Dispatch events and log activities when the TypeOfPermit is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\TypeOfPermit $data
     */
    protected function handleEventAndLogActivity(TypeOfPermit $data): void
    {
        TypeOfPermitEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the TypeOfPermit "created" event.
     */
    public function created(TypeOfPermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TypeOfPermit "updated" event.
     */
    public function updated(TypeOfPermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TypeOfPermit "deleted" event.
     */
    public function deleted(TypeOfPermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TypeOfPermit "restored" event.
     */
    public function restored(TypeOfPermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TypeOfPermit "force deleted" event.
     */
    public function forceDeleted(TypeOfPermit $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
