<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeLanguageSkillEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeLanguageSkill;

class EmployeeLanguageSkillObserver
{
    /**
     * Dispatch events and log activities when the EmployeeLanguageSkill is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeLanguageSkill $data
     */
    protected function handleEventAndLogActivity(EmployeeLanguageSkill $data): void
    {
        EmployeeLanguageSkillEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeLanguageSkill "created" event.
     */
    public function created(EmployeeLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeLanguageSkill "updated" event.
     */
    public function updated(EmployeeLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeLanguageSkill "deleted" event.
     */
    public function deleted(EmployeeLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeLanguageSkill "restored" event.
     */
    public function restored(EmployeeLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeLanguageSkill "force deleted" event.
     */
    public function forceDeleted(EmployeeLanguageSkill $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
