<?php

namespace Modules\Master\App\Observers;

use Modules\Master\App\Events\VerificationCodeTypeEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Master\App\Models\VerificationCodeType;

class VerificationCodeTypeObserver
{
    /**
     * Dispatch events and log activities when the VerificationCodeType is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\VerificationCodeType $data
     */
    protected function handleEventAndLogActivity(VerificationCodeType $data): void
    {
        VerificationCodeTypeEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the VerificationCodeType "created" event.
     */
    public function created(VerificationCodeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the VerificationCodeType "updated" event.
     */
    public function updated(VerificationCodeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the VerificationCodeType "deleted" event.
     */
    public function deleted(VerificationCodeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the VerificationCodeType "restored" event.
     */
    public function restored(VerificationCodeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the VerificationCodeType "force deleted" event.
     */
    public function forceDeleted(VerificationCodeType $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
