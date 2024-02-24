<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantMediaSocialEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantMediaSocial;

class ApplicantMediaSocialObserver
{
    /**
     * Dispatch events and log activities when the ApplicantMediaSocial is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantMediaSocial $data
     */
    protected function handleEventAndLogActivity(ApplicantMediaSocial $data): void
    {
        ApplicantMediaSocialEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantMediaSocial "created" event.
     */
    public function created(ApplicantMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantMediaSocial "updated" event.
     */
    public function updated(ApplicantMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantMediaSocial "deleted" event.
     */
    public function deleted(ApplicantMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantMediaSocial "restored" event.
     */
    public function restored(ApplicantMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantMediaSocial "force deleted" event.
     */
    public function forceDeleted(ApplicantMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
