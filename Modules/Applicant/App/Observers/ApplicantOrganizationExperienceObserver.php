<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantOrganizationExperienceEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantOrganizationExperience;

class ApplicantOrganizationExperienceObserver
{
    /**
     * Dispatch events and log activities when the ApplicantOrganizationExperience is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantOrganizationExperience $data
     */
    protected function handleEventAndLogActivity(ApplicantOrganizationExperience $data): void
    {
        ApplicantOrganizationExperienceEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantOrganizationExperience "created" event.
     */
    public function created(ApplicantOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantOrganizationExperience "updated" event.
     */
    public function updated(ApplicantOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantOrganizationExperience "deleted" event.
     */
    public function deleted(ApplicantOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantOrganizationExperience "restored" event.
     */
    public function restored(ApplicantOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantOrganizationExperience "force deleted" event.
     */
    public function forceDeleted(ApplicantOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
