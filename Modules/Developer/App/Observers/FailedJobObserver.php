<?php

namespace Modules\Developer\App\Observers;

use Modules\Developer\App\Events\FailedJobEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Developer\App\Models\FailedJob;

class FailedJobObserver
{
    /**
     * Dispatch events and log activities when the FailedJob is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\FailedJob $data
     */
    protected function handleEventAndLogActivity(FailedJob $data): void
    {
        FailedJobEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the FailedJob "created" event.
     */
    public function created(FailedJob $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FailedJob "updated" event.
     */
    public function updated(FailedJob $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FailedJob "deleted" event.
     */
    public function deleted(FailedJob $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FailedJob "restored" event.
     */
    public function restored(FailedJob $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FailedJob "force deleted" event.
     */
    public function forceDeleted(FailedJob $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
