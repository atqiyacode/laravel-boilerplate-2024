<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantRelationReferenceEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantRelationReference;

class ApplicantRelationReferenceObserver
{
    /**
     * Dispatch events and log activities when the ApplicantRelationReference is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantRelationReference $data
     */
    protected function handleEventAndLogActivity(ApplicantRelationReference $data): void
    {
        ApplicantRelationReferenceEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantRelationReference "created" event.
     */
    public function created(ApplicantRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantRelationReference "updated" event.
     */
    public function updated(ApplicantRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantRelationReference "deleted" event.
     */
    public function deleted(ApplicantRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantRelationReference "restored" event.
     */
    public function restored(ApplicantRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantRelationReference "force deleted" event.
     */
    public function forceDeleted(ApplicantRelationReference $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
