<?php

namespace App\Observers;

use App\Events\UniversityEvent;
use App\Events\UserLogActivityEvent;
use App\Models\University;

class UniversityObserver
{
    /**
     * Dispatch events and log activities when the University is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\University $data
     */
    protected function handleEventAndLogActivity(University $data): void
    {
        UniversityEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the University "created" event.
     */
    public function created(University $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the University "updated" event.
     */
    public function updated(University $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the University "deleted" event.
     */
    public function deleted(University $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the University "restored" event.
     */
    public function restored(University $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the University "force deleted" event.
     */
    public function forceDeleted(University $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
