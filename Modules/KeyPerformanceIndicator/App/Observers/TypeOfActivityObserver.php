<?php

namespace Modules\KeyPerformanceIndicator\Observers;

use Modules\KeyPerformanceIndicator\Events\TypeOfActivityEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\KeyPerformanceIndicator\Models\TypeOfActivity;

class TypeOfActivityObserver
{
    /**
     * Dispatch events and log activities when the TypeOfActivity is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\TypeOfActivity $data
     */
    protected function handleEventAndLogActivity(TypeOfActivity $data): void
    {
        TypeOfActivityEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the TypeOfActivity "created" event.
     */
    public function created(TypeOfActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TypeOfActivity "updated" event.
     */
    public function updated(TypeOfActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TypeOfActivity "deleted" event.
     */
    public function deleted(TypeOfActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TypeOfActivity "restored" event.
     */
    public function restored(TypeOfActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TypeOfActivity "force deleted" event.
     */
    public function forceDeleted(TypeOfActivity $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
