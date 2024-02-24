<?php

namespace Modules\Others\App\Observers;

use Modules\Others\App\Events\PrivacyPolicyEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Others\App\Models\PrivacyPolicy;

class PrivacyPolicyObserver
{
    /**
     * Dispatch events and log activities when the PrivacyPolicy is created, updated, deleted, restored, or force deleted.
     *
     * @param \Modules\Others\App\Models\PrivacyPolicy $data
     */
    protected function handleEventAndLogActivity(PrivacyPolicy $data): void
    {
        PrivacyPolicyEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the PrivacyPolicy "created" event.
     */
    public function created(PrivacyPolicy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PrivacyPolicy "updated" event.
     */
    public function updated(PrivacyPolicy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PrivacyPolicy "deleted" event.
     */
    public function deleted(PrivacyPolicy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PrivacyPolicy "restored" event.
     */
    public function restored(PrivacyPolicy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the PrivacyPolicy "force deleted" event.
     */
    public function forceDeleted(PrivacyPolicy $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
