<?php

namespace Modules\User\App\Observers;

use Modules\User\App\Events\UserEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\User\App\Models\User;

class UserObserver
{
    /**
     * Dispatch events and log activities when the User is created, updated, deleted, restored, or force deleted.
     *
     * @param \Modules\User\App\Models\User $data
     */
    protected function handleEventAndLogActivity(User $data): void
    {
        UserEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the User "created" event.
     */
    public function created(User $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
