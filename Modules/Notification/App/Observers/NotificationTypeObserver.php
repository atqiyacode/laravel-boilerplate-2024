<?php

namespace Modules\Notification\App\Observers;

use Modules\Notification\App\Events\NotificationTypeEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Notification\App\Models\NotificationType;

class NotificationTypeObserver
{
    /**
     * Dispatch events and log activities when the NotificationType is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\NotificationType $data
     */
    protected function handleEventAndLogActivity(NotificationType $data): void
    {
        NotificationTypeEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the NotificationType "created" event.
     */
    public function created(NotificationType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the NotificationType "updated" event.
     */
    public function updated(NotificationType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the NotificationType "deleted" event.
     */
    public function deleted(NotificationType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the NotificationType "restored" event.
     */
    public function restored(NotificationType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the NotificationType "force deleted" event.
     */
    public function forceDeleted(NotificationType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
