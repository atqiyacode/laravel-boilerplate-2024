<?php

namespace Modules\DynamicForm\App\Observers;

use Modules\DynamicForm\App\Events\OptionEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\DynamicForm\App\Models\Option;

class OptionObserver
{
    /**
     * Dispatch events and log activities when the Option is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Option $data
     */
    protected function handleEventAndLogActivity(Option $data): void
    {
        OptionEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Option "created" event.
     */
    public function created(Option $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Option "updated" event.
     */
    public function updated(Option $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Option "deleted" event.
     */
    public function deleted(Option $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Option "restored" event.
     */
    public function restored(Option $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Option "force deleted" event.
     */
    public function forceDeleted(Option $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
