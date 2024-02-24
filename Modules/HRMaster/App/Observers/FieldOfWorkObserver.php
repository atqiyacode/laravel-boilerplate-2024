<?php

namespace Modules\HRMaster\App\Observers;

use Modules\HRMaster\App\Events\FieldOfWorkEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\HRMaster\App\Models\FieldOfWork;

class FieldOfWorkObserver
{
    /**
     * Dispatch events and log activities when the FieldOfWork is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\FieldOfWork $data
     */
    protected function handleEventAndLogActivity(FieldOfWork $data): void
    {
        FieldOfWorkEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the FieldOfWork "created" event.
     */
    public function created(FieldOfWork $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FieldOfWork "updated" event.
     */
    public function updated(FieldOfWork $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FieldOfWork "deleted" event.
     */
    public function deleted(FieldOfWork $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FieldOfWork "restored" event.
     */
    public function restored(FieldOfWork $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FieldOfWork "force deleted" event.
     */
    public function forceDeleted(FieldOfWork $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
