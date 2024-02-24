<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantEducationEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantEducation;

class ApplicantEducationObserver
{
    /**
     * Dispatch events and log activities when the ApplicantEducation is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantEducation $data
     */
    protected function handleEventAndLogActivity(ApplicantEducation $data): void
    {
        ApplicantEducationEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantEducation "created" event.
     */
    public function created(ApplicantEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantEducation "updated" event.
     */
    public function updated(ApplicantEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantEducation "deleted" event.
     */
    public function deleted(ApplicantEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantEducation "restored" event.
     */
    public function restored(ApplicantEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantEducation "force deleted" event.
     */
    public function forceDeleted(ApplicantEducation $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
