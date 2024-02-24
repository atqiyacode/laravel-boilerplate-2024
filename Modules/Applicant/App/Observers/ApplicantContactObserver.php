<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantContactEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantContact;

class ApplicantContactObserver
{
    /**
     * Dispatch events and log activities when the ApplicantContact is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantContact $data
     */
    protected function handleEventAndLogActivity(ApplicantContact $data): void
    {
        ApplicantContactEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantContact "created" event.
     */
    public function created(ApplicantContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantContact "updated" event.
     */
    public function updated(ApplicantContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantContact "deleted" event.
     */
    public function deleted(ApplicantContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantContact "restored" event.
     */
    public function restored(ApplicantContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantContact "force deleted" event.
     */
    public function forceDeleted(ApplicantContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
