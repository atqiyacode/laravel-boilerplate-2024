<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantCertificateOfExpertiseEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantCertificateOfExpertise;

class ApplicantCertificateOfExpertiseObserver
{
    /**
     * Dispatch events and log activities when the ApplicantCertificateOfExpertise is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantCertificateOfExpertise $data
     */
    protected function handleEventAndLogActivity(ApplicantCertificateOfExpertise $data): void
    {
        ApplicantCertificateOfExpertiseEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantCertificateOfExpertise "created" event.
     */
    public function created(ApplicantCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantCertificateOfExpertise "updated" event.
     */
    public function updated(ApplicantCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantCertificateOfExpertise "deleted" event.
     */
    public function deleted(ApplicantCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantCertificateOfExpertise "restored" event.
     */
    public function restored(ApplicantCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantCertificateOfExpertise "force deleted" event.
     */
    public function forceDeleted(ApplicantCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
