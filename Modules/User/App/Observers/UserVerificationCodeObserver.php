<?php

namespace Modules\User\App\Observers;

use Modules\User\App\Events\UserVerificationCodeEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\User\App\Models\UserVerificationCode;

class UserVerificationCodeObserver
{
    /**
     * Dispatch events and log activities when the UserVerificationCode is created, updated, deleted, restored, or force deleted.
     *
     * @param \Modules\User\App\Models\UserVerificationCode $data
     */
    protected function handleEventAndLogActivity(UserVerificationCode $data): void
    {
        UserVerificationCodeEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the UserVerificationCode "created" event.
     */
    public function created(UserVerificationCode $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserVerificationCode "updated" event.
     */
    public function updated(UserVerificationCode $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserVerificationCode "deleted" event.
     */
    public function deleted(UserVerificationCode $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserVerificationCode "restored" event.
     */
    public function restored(UserVerificationCode $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the UserVerificationCode "force deleted" event.
     */
    public function forceDeleted(UserVerificationCode $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
