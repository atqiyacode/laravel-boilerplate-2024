<?php

namespace App\Observers;

use App\Events\GenderEvent;
use App\Events\UserLogActivityEvent;
use App\Models\Gender;

class GenderObserver
{
    /**
     * Dispatch events and log activities when the Gender is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Gender $data
     */
    protected function handleEventAndLogActivity(Gender $data): void
    {
        GenderEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Gender "created" event.
     */
    public function created(Gender $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Gender "updated" event.
     */
    public function updated(Gender $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Gender "deleted" event.
     */
    public function deleted(Gender $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Gender "restored" event.
     */
    public function restored(Gender $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Gender "force deleted" event.
     */
    public function forceDeleted(Gender $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
