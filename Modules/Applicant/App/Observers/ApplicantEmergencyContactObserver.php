<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantEmergencyContactEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantEmergencyContact;

class ApplicantEmergencyContactObserver
{
    /**
     * Dispatch events and log activities when the ApplicantEmergencyContact is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantEmergencyContact $data
     */
    protected function handleEventAndLogActivity(ApplicantEmergencyContact $data): void
    {
        ApplicantEmergencyContactEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantEmergencyContact "created" event.
     */
    public function created(ApplicantEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantEmergencyContact "updated" event.
     */
    public function updated(ApplicantEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantEmergencyContact "deleted" event.
     */
    public function deleted(ApplicantEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantEmergencyContact "restored" event.
     */
    public function restored(ApplicantEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantEmergencyContact "force deleted" event.
     */
    public function forceDeleted(ApplicantEmergencyContact $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
