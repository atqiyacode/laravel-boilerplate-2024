<?php

namespace Modules\Others\App\Observers;

use Modules\Others\App\Events\FAQEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Others\App\Models\FAQ;

class FAQObserver
{
    /**
     * Dispatch events and log activities when the EmployeeType is created, updated, deleted, restored, or force deleted.
     *
     * @param \Modules\Others\App\Models\FAQ $data
     */
    protected function handleEventAndLogActivity(FAQ $data): void
    {
        FAQEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the FAQ "created" event.
     */
    public function created(FAQ $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FAQ "updated" event.
     */
    public function updated(FAQ $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FAQ "deleted" event.
     */
    public function deleted(FAQ $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FAQ "restored" event.
     */
    public function restored(FAQ $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FAQ "force deleted" event.
     */
    public function forceDeleted(FAQ $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
