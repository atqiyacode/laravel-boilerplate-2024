<?php

namespace Modules\JobApplication\App\Observers;

use Modules\JobApplication\App\Events\JobApplicationStatusEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\JobApplication\App\Models\JobApplicationStatus;

class JobApplicationStatusObserver
{
    /**
     * Dispatch events and log activities when the JobApplicationStatus is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\JobApplicationStatus $data
     */
    protected function handleEventAndLogActivity(JobApplicationStatus $data): void
    {
        JobApplicationStatusEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the JobApplicationStatus "created" event.
     */
    public function created(JobApplicationStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobApplicationStatus "updated" event.
     */
    public function updated(JobApplicationStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobApplicationStatus "deleted" event.
     */
    public function deleted(JobApplicationStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobApplicationStatus "restored" event.
     */
    public function restored(JobApplicationStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobApplicationStatus "force deleted" event.
     */
    public function forceDeleted(JobApplicationStatus $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
