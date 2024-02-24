<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeAchievementEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeAchievement;

class EmployeeAchievementObserver
{
    /**
     * Dispatch events and log activities when the EmployeeAchievement is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeAchievement $data
     */
    protected function handleEventAndLogActivity(EmployeeAchievement $data): void
    {
        EmployeeAchievementEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeAchievement "created" event.
     */
    public function created(EmployeeAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeAchievement "updated" event.
     */
    public function updated(EmployeeAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeAchievement "deleted" event.
     */
    public function deleted(EmployeeAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeAchievement "restored" event.
     */
    public function restored(EmployeeAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeAchievement "force deleted" event.
     */
    public function forceDeleted(EmployeeAchievement $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
