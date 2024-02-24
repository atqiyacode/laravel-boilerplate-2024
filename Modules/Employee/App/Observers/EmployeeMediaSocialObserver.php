<?php

namespace App\Observers;

use App\Events\EmployeeMediaSocialEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeeMediaSocial;

class EmployeeMediaSocialObserver
{
    /**
     * Dispatch events and log activities when the EmployeeMediaSocial is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeMediaSocial $data
     */
    protected function handleEventAndLogActivity(EmployeeMediaSocial $data): void
    {
        EmployeeMediaSocialEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeMediaSocial "created" event.
     */
    public function created(EmployeeMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeMediaSocial "updated" event.
     */
    public function updated(EmployeeMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeMediaSocial "deleted" event.
     */
    public function deleted(EmployeeMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeMediaSocial "restored" event.
     */
    public function restored(EmployeeMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeMediaSocial "force deleted" event.
     */
    public function forceDeleted(EmployeeMediaSocial $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
