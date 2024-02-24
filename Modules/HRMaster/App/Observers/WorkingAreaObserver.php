<?php

namespace Modules\HRMaster\App\Observers;

use Modules\HRMaster\App\Events\WorkingAreaEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\HRMaster\App\Models\WorkingArea;

class WorkingAreaObserver
{
    /**
     * Dispatch events and log activities when the WorkingArea is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\WorkingArea $data
     */
    protected function handleEventAndLogActivity(WorkingArea $data): void
    {
        WorkingAreaEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the WorkingArea "created" event.
     */
    public function created(WorkingArea $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the WorkingArea "updated" event.
     */
    public function updated(WorkingArea $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the WorkingArea "deleted" event.
     */
    public function deleted(WorkingArea $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the WorkingArea "restored" event.
     */
    public function restored(WorkingArea $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the WorkingArea "force deleted" event.
     */
    public function forceDeleted(WorkingArea $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
