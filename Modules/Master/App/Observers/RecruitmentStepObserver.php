<?php

namespace Modules\Master\App\Observers;

use Modules\Master\App\Events\RecruitmentStepEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Master\App\Models\RecruitmentStep;

class RecruitmentStepObserver
{
    /**
     * Dispatch events and log activities when the RecruitmentStep is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\RecruitmentStep $data
     */
    protected function handleEventAndLogActivity(RecruitmentStep $data): void
    {
        RecruitmentStepEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the RecruitmentStep "created" event.
     */
    public function created(RecruitmentStep $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the RecruitmentStep "updated" event.
     */
    public function updated(RecruitmentStep $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the RecruitmentStep "deleted" event.
     */
    public function deleted(RecruitmentStep $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the RecruitmentStep "restored" event.
     */
    public function restored(RecruitmentStep $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the RecruitmentStep "force deleted" event.
     */
    public function forceDeleted(RecruitmentStep $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
