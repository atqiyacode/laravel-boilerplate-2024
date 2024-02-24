<?php

namespace Modules\Master\App\Observers;

use Modules\Master\App\Events\RoleEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Master\App\Models\Role;

class RoleObserver
{
    /**
     * Dispatch events and log activities when the Role is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Role $data
     */
    protected function handleEventAndLogActivity(Role $data): void
    {
        RoleEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Role "created" event.
     */
    public function created(Role $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Role "updated" event.
     */
    public function updated(Role $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Role $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Role $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Role $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
