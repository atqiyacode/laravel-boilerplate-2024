<?php

namespace Modules\MobileApp\App\Observers;

use Modules\MobileApp\App\Events\MobileVersionEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\MobileApp\App\Models\MobileVersion;

class MobileVersionObserver
{
    /**
     * Dispatch events and log activities when the MobileVersion is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\MobileVersion $data
     */
    protected function handleEventAndLogActivity(MobileVersion $data): void
    {
        MobileVersionEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the MobileVersion "created" event.
     */
    public function created(MobileVersion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileVersion "updated" event.
     */
    public function updated(MobileVersion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileVersion "deleted" event.
     */
    public function deleted(MobileVersion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileVersion "restored" event.
     */
    public function restored(MobileVersion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileVersion "force deleted" event.
     */
    public function forceDeleted(MobileVersion $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
