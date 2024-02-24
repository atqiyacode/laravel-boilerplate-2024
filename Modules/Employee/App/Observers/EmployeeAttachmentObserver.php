<?php

namespace App\Observers;

use App\Events\EmployeeAttachmentEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeeAttachment;

class EmployeeAttachmentObserver
{
    /**
     * Dispatch events and log activities when the EmployeeAttachment is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeAttachment $data
     */
    protected function handleEventAndLogAttachment(EmployeeAttachment $data): void
    {
        EmployeeAttachmentEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeAttachment "created" event.
     */
    public function created(EmployeeAttachment $data): void
    {
        $this->handleEventAndLogAttachment($data);
    }

    /**
     * Handle the EmployeeAttachment "updated" event.
     */
    public function updated(EmployeeAttachment $data): void
    {
        $this->handleEventAndLogAttachment($data);
    }

    /**
     * Handle the EmployeeAttachment "deleted" event.
     */
    public function deleted(EmployeeAttachment $data): void
    {
        $this->handleEventAndLogAttachment($data);
    }

    /**
     * Handle the EmployeeAttachment "restored" event.
     */
    public function restored(EmployeeAttachment $data): void
    {
        $this->handleEventAndLogAttachment($data);
    }

    /**
     * Handle the EmployeeAttachment "force deleted" event.
     */
    public function forceDeleted(EmployeeAttachment $data): void
    {
        $this->handleEventAndLogAttachment($data);
    }
}
