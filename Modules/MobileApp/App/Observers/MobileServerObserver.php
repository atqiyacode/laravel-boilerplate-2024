<?php

namespace Modules\MobileApp\App\Observers;

use Modules\MobileApp\App\Events\MobileServerEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\MobileApp\App\Models\MobileServer;

class MobileServerObserver
{
    /**
     * Dispatch events and log activities when the MobileServer is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\MobileServer $data
     */
    protected function handleEventAndLogActivity(MobileServer $data): void
    {
        MobileServerEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the MobileServer "created" event.
     */
    public function created(MobileServer $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileServer "updated" event.
     */
    public function updated(MobileServer $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileServer "deleted" event.
     */
    public function deleted(MobileServer $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileServer "restored" event.
     */
    public function restored(MobileServer $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileServer "force deleted" event.
     */
    public function forceDeleted(MobileServer $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
