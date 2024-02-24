<?php

namespace Modules\Master\App\Observers;

use Modules\Master\App\Events\ReligionEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Master\App\Models\Religion;

class ReligionObserver
{
    /**
     * Dispatch events and log activities when the Religion is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Religion $data
     */
    protected function handleEventAndLogActivity(Religion $data): void
    {
        ReligionEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Religion "created" event.
     */
    public function created(Religion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Religion "updated" event.
     */
    public function updated(Religion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Religion "deleted" event.
     */
    public function deleted(Religion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Religion "restored" event.
     */
    public function restored(Religion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Religion "force deleted" event.
     */
    public function forceDeleted(Religion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
