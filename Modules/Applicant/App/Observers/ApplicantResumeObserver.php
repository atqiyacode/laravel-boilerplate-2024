<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantResumeEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantResume;

class ApplicantResumeObserver
{
    /**
     * Dispatch events and log activities when the ApplicantResume is created, updated, deleted, restored, or force deleted.
     *
     * @param \Modules\Applicant\App\Models\ApplicantResume $data
     */
    protected function handleEventAndLogActivity(ApplicantResume $data): void
    {
        ApplicantResumeEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantResume "created" event.
     */
    public function created(ApplicantResume $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantResume "updated" event.
     */
    public function updated(ApplicantResume $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantResume "deleted" event.
     */
    public function deleted(ApplicantResume $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantResume "restored" event.
     */
    public function restored(ApplicantResume $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantResume "force deleted" event.
     */
    public function forceDeleted(ApplicantResume $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
