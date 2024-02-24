<?php

namespace Modules\HRMaster\App\Observers;

use Modules\HRMaster\App\Events\MainClassEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\HRMaster\App\Models\MainClass;

class MainClassObserver
{
    /**
     * Dispatch events and log activities when the MainClass is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\MainClass $data
     */
    protected function handleEventAndLogActivity(MainClass $data): void
    {
        MainClassEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the MainClass "created" event.
     */
    public function created(MainClass $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MainClass "updated" event.
     */
    public function updated(MainClass $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MainClass "deleted" event.
     */
    public function deleted(MainClass $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MainClass "restored" event.
     */
    public function restored(MainClass $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MainClass "force deleted" event.
     */
    public function forceDeleted(MainClass $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
