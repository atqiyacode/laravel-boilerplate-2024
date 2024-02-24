<?php

namespace Modules\KeyPerformanceIndicator\Observers;

use Modules\KeyPerformanceIndicator\Events\ResponseDataEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\KeyPerformanceIndicator\Models\ResponseData;

class ResponseDataObserver
{
    /**
     * Dispatch events and log activities when the ResponseData is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ResponseData $data
     */
    protected function handleEventAndLogActivity(ResponseData $data): void
    {
        ResponseDataEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ResponseData "created" event.
     */
    public function created(ResponseData $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ResponseData "updated" event.
     */
    public function updated(ResponseData $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ResponseData "deleted" event.
     */
    public function deleted(ResponseData $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ResponseData "restored" event.
     */
    public function restored(ResponseData $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ResponseData "force deleted" event.
     */
    public function forceDeleted(ResponseData $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
