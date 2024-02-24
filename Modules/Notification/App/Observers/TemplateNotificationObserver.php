<?php

namespace Modules\Notification\App\Observers;

use Modules\Notification\App\Events\TemplateNotificationEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Notification\App\Models\TemplateNotification;

class TemplateNotificationObserver
{
    /**
     * Dispatch events and log activities when the TemplateNotification is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\TemplateNotification $data
     */
    protected function handleEventAndLogActivity(TemplateNotification $data): void
    {
        TemplateNotificationEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the TemplateNotification "created" event.
     */
    public function created(TemplateNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TemplateNotification "updated" event.
     */
    public function updated(TemplateNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TemplateNotification "deleted" event.
     */
    public function deleted(TemplateNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TemplateNotification "restored" event.
     */
    public function restored(TemplateNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the TemplateNotification "force deleted" event.
     */
    public function forceDeleted(TemplateNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
