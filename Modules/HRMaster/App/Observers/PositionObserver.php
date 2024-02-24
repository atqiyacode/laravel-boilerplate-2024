<?php

namespace Modules\HRMaster\App\Observers;

use Modules\HRMaster\App\Events\PositionEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\HRMaster\App\Models\Position;

class PositionObserver
{
    /**
     * Dispatch events and log activities when the Position is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Position $data
     */
    protected function handleEventAndLogActivity(Position $data): void
    {
        PositionEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Position "created" event.
     */
    public function created(Position $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Position "updated" event.
     */
    public function updated(Position $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Position "deleted" event.
     */
    public function deleted(Position $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Position "restored" event.
     */
    public function restored(Position $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Position "force deleted" event.
     */
    public function forceDeleted(Position $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
