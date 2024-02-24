<?php

namespace Modules\MobileApp\App\Observers;

use Modules\MobileApp\App\Events\MobileAppMenuEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\MobileApp\App\Models\MobileAppMenu;

class MobileAppMenuObserver
{
    /**
     * Dispatch events and log activities when the MobileAppMenu is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\MobileAppMenu $data
     */
    protected function handleEventAndLogActivity(MobileAppMenu $data): void
    {
        MobileAppMenuEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the MobileAppMenu "created" event.
     */
    public function created(MobileAppMenu $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileAppMenu "updated" event.
     */
    public function updated(MobileAppMenu $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileAppMenu "deleted" event.
     */
    public function deleted(MobileAppMenu $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileAppMenu "restored" event.
     */
    public function restored(MobileAppMenu $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileAppMenu "force deleted" event.
     */
    public function forceDeleted(MobileAppMenu $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
