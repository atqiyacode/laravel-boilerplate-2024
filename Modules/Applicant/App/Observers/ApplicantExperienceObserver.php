<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantExperienceEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantExperience;

class ApplicantExperienceObserver
{
    /**
     * Dispatch events and log activities when the ApplicantExperience is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantExperience $data
     */
    protected function handleEventAndLogActivity(ApplicantExperience $data): void
    {
        ApplicantExperienceEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantExperience "created" event.
     */
    public function created(ApplicantExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantExperience "updated" event.
     */
    public function updated(ApplicantExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantExperience "deleted" event.
     */
    public function deleted(ApplicantExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantExperience "restored" event.
     */
    public function restored(ApplicantExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantExperience "force deleted" event.
     */
    public function forceDeleted(ApplicantExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
