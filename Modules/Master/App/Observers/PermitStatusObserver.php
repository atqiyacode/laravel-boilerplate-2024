<?php

namespace Modules\Master\App\Observers;

use Modules\Master\App\Events\PermitStatusEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Master\App\Models\PermitStatus;

class PermitStatusObserver
{
    /**
     * Dispatch events and log activities when the PermitStatus is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\PermitStatus $data
     */
    protected function handleEventAndLogActivity(PermitStatus $data): void
    {
        PermitStatusEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the PermitStatus "created" event.
     */
    public function created(PermitStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PermitStatus "updated" event.
     */
    public function updated(PermitStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PermitStatus "deleted" event.
     */
    public function deleted(PermitStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PermitStatus "restored" event.
     */
    public function restored(PermitStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PermitStatus "force deleted" event.
     */
    public function forceDeleted(PermitStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
