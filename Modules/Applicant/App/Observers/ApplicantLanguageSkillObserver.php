<?php

namespace Modules\Applicant\App\Observers;

use Modules\Applicant\App\Events\ApplicantLanguageSkillEvent;
use Modules\Applicant\App\Events\UserLogActivityEvent;
use Modules\Applicant\App\Models\ApplicantLanguageSkill;

class ApplicantLanguageSkillObserver
{
    /**
     * Dispatch events and log activities when the ApplicantLanguageSkill is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\ApplicantLanguageSkill $data
     */
    protected function handleEventAndLogActivity(ApplicantLanguageSkill $data): void
    {
        ApplicantLanguageSkillEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the ApplicantLanguageSkill "created" event.
     */
    public function created(ApplicantLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantLanguageSkill "updated" event.
     */
    public function updated(ApplicantLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantLanguageSkill "deleted" event.
     */
    public function deleted(ApplicantLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantLanguageSkill "restored" event.
     */
    public function restored(ApplicantLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the ApplicantLanguageSkill "force deleted" event.
     */
    public function forceDeleted(ApplicantLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
