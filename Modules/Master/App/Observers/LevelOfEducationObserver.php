<?php

namespace Modules\Master\App\Observers;

use Modules\Master\App\Events\LevelOfEducationEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Master\App\Models\LevelOfEducation;

class LevelOfEducationObserver
{
    /**
     * Dispatch events and log activities when the LevelOfEducation is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\LevelOfEducation $data
     */
    protected function handleEventAndLogActivity(LevelOfEducation $data): void
    {
        LevelOfEducationEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the LevelOfEducation "created" event.
     */
    public function created(LevelOfEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the LevelOfEducation "updated" event.
     */
    public function updated(LevelOfEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the LevelOfEducation "deleted" event.
     */
    public function deleted(LevelOfEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the LevelOfEducation "restored" event.
     */
    public function restored(LevelOfEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the LevelOfEducation "force deleted" event.
     */
    public function forceDeleted(LevelOfEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
