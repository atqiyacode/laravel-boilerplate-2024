<?php

namespace Modules\Others\App\Observers;

use Modules\Others\App\Events\TermAndConditionEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Others\App\Models\TermAndCondition;

class TermAndConditionObserver
{
    /**
     * Dispatch events and log activities when the TermAndCondition is created, updated, deleted, restored, or force deleted.
     *
     * @param \Modules\Others\App\Models\TermAndCondition $data
     */
    protected function handleEventAndLogActivity(TermAndCondition $data): void
    {
        TermAndConditionEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the TermAndCondition "created" event.
     */
    public function created(TermAndCondition $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TermAndCondition "updated" event.
     */
    public function updated(TermAndCondition $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TermAndCondition "deleted" event.
     */
    public function deleted(TermAndCondition $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TermAndCondition "restored" event.
     */
    public function restored(TermAndCondition $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TermAndCondition "force deleted" event.
     */
    public function forceDeleted(TermAndCondition $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
