<?php

namespace Modules\HRMaster\App\Observers;

use Modules\HRMaster\App\Events\UnitEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\HRMaster\App\Jobs\TelegramJob;
use Modules\HRMaster\App\Models\Unit;

class UnitObserver
{
    /**
     * Dispatch events and log activities when the Unit is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Unit $data
     */
    protected function handleEventAndLogActivity(Unit $data): void
    {
        UnitEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Unit "created" event.
     */
    public function created(Unit $data): void
    {
        $this->handleEventAndLogActivity($data);
        TelegramJob::dispatch(auth()->user()->email, '\App\Models\Unit', 'create', $data);
    }

    public function updated(Unit $data): void
    {
        $this->handleEventAndLogActivity($data);
        TelegramJob::dispatch(auth()->user()->email, '\App\Models\Unit', 'update', $data);
    }

    /**
     * Handle the Unit "deleted" event.
     */
    public function deleted(Unit $data): void
    {
        $this->handleEventAndLogActivity($data);
        TelegramJob::dispatch(auth()->user()->email, '\App\Models\Unit', 'delete', $data);
    }

    /**
     * Handle the Unit "restored" event.
     */
    public function restored(Unit $data): void
    {
        $this->handleEventAndLogActivity($data);
        TelegramJob::dispatch(auth()->user()->email, '\App\Models\Unit', 'restore', $data);
    }

    /**
     * Handle the Unit "force deleted" event.
     */
    public function forceDeleted(Unit $data): void
    {
        $this->handleEventAndLogActivity($data);
        TelegramJob::dispatch(auth()->user()->email, '\App\Models\Unit', 'force delete', $data);
    }
}
