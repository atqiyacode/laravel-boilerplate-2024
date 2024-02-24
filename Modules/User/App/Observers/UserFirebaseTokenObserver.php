<?php

namespace Modules\User\App\Observers;

use Modules\User\App\Events\UserFirebaseTokenEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\User\App\Models\UserFirebaseToken;

class UserFirebaseTokenObserver
{
    /**
     * Dispatch events and log activities when the UserFirebaseToken is created, updated, deleted, restored, or force deleted.
     *
     * @param \Modules\User\App\Models\UserFirebaseToken $data
     */
    protected function handleEventAndLogActivity(UserFirebaseToken $data): void
    {
        UserFirebaseTokenEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the UserFirebaseToken "created" event.
     */
    public function created(UserFirebaseToken $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserFirebaseToken "updated" event.
     */
    public function updated(UserFirebaseToken $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserFirebaseToken "deleted" event.
     */
    public function deleted(UserFirebaseToken $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserFirebaseToken "restored" event.
     */
    public function restored(UserFirebaseToken $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserFirebaseToken "force deleted" event.
     */
    public function forceDeleted(UserFirebaseToken $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
