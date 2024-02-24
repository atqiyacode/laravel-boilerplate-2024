<?php

namespace Modules\User\App\Observers;

use Modules\User\App\Events\UserNotificationEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\User\App\Models\UserNotification;

class UserNotificationObserver
{
    /**
     * Dispatch events and log activities when the UserNotification is created, updated, deleted, restored, or force deleted.
     *
     * @param \Modules\User\App\Models\UserNotification $data
     */
    protected function handleEventAndLogActivity(UserNotification $data): void
    {
        UserNotificationEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the UserNotification "created" event.
     */
    public function created(UserNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserNotification "updated" event.
     */
    public function updated(UserNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserNotification "deleted" event.
     */
    public function deleted(UserNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserNotification "restored" event.
     */
    public function restored(UserNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserNotification "force deleted" event.
     */
    public function forceDeleted(UserNotification $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
