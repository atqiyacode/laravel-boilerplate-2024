<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantAchievementEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantAchievement;

class ApplicantAchievementObserver
{
    /**
     * Dispatch events and log activities when the ApplicantAchievement is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantAchievement $data
     */
    protected function handleEventAndLogActivity(ApplicantAchievement $data): void
    {
        ApplicantAchievementEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantAchievement "created" event.
     */
    public function created(ApplicantAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantAchievement "updated" event.
     */
    public function updated(ApplicantAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantAchievement "deleted" event.
     */
    public function deleted(ApplicantAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantAchievement "restored" event.
     */
    public function restored(ApplicantAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantAchievement "force deleted" event.
     */
    public function forceDeleted(ApplicantAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
