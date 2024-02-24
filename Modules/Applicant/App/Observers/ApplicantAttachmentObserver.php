<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantAttachmentEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantAttachment;

class ApplicantAttachmentObserver
{
    /**
     * Dispatch events and log activities when the ApplicantAttachment is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantAttachment $data
     */
    protected function handleEventAndLogActivity(ApplicantAttachment $data): void
    {
        ApplicantAttachmentEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantAttachment "created" event.
     */
    public function created(ApplicantAttachment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantAttachment "updated" event.
     */
    public function updated(ApplicantAttachment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantAttachment "deleted" event.
     */
    public function deleted(ApplicantAttachment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantAttachment "restored" event.
     */
    public function restored(ApplicantAttachment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantAttachment "force deleted" event.
     */
    public function forceDeleted(ApplicantAttachment $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
