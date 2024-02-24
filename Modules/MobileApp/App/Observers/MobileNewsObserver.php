<?php

namespace Modules\MobileApp\App\Observers;

use Modules\MobileApp\App\Events\MobileNewsEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\MobileApp\App\Models\MobileNews;

class MobileNewsObserver
{
    /**
     * Dispatch events and log activities when the MobileNews is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\MobileNews $data
     */
    protected function handleEventAndLogActivity(MobileNews $data): void
    {
        MobileNewsEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the MobileNews "created" event.
     */
    public function created(MobileNews $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileNews "updated" event.
     */
    public function updated(MobileNews $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileNews "deleted" event.
     */
    public function deleted(MobileNews $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileNews "restored" event.
     */
    public function restored(MobileNews $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the MobileNews "force deleted" event.
     */
    public function forceDeleted(MobileNews $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
