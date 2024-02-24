<?php

namespace Modules\JobApplication\App\Observers;

use Modules\JobApplication\App\Events\JobApplicationEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\JobApplication\App\Models\JobApplication;

class JobApplicationObserver
{
    /**
     * Dispatch events and log activities when the JobApplication is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\JobApplication $data
     */
    protected function handleEventAndLogActivity(JobApplication $data): void
    {
        JobApplicationEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the JobApplication "created" event.
     */
    public function created(JobApplication $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobApplication "updated" event.
     */
    public function updated(JobApplication $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobApplication "deleted" event.
     */
    public function deleted(JobApplication $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobApplication "restored" event.
     */
    public function restored(JobApplication $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the JobApplication "force deleted" event.
     */
    public function forceDeleted(JobApplication $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
