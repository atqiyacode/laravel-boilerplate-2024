<?php

namespace Modules\JobVacancy\App\Observers;

use Modules\JobVacancy\App\Events\JobVacancyEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\JobVacancy\App\Models\JobVacancy;

class JobVacancyObserver
{
    /**
     * Dispatch events and log activities when the JobVacancy is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\JobVacancy $data
     */
    protected function handleEventAndLogActivity(JobVacancy $data): void
    {
        JobVacancyEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the JobVacancy "created" event.
     */
    public function created(JobVacancy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobVacancy "updated" event.
     */
    public function updated(JobVacancy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobVacancy "deleted" event.
     */
    public function deleted(JobVacancy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobVacancy "restored" event.
     */
    public function restored(JobVacancy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobVacancy "force deleted" event.
     */
    public function forceDeleted(JobVacancy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
