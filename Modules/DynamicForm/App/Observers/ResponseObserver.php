<?php

namespace Modules\DynamicForm\App\Observers;

use Modules\DynamicForm\App\Events\ResponseEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\DynamicForm\App\Models\Response;

class ResponseObserver
{
    /**
     * Dispatch events and log activities when the Response is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Response $data
     */
    protected function handleEventAndLogActivity(Response $data): void
    {
        ResponseEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Response "created" event.
     */
    public function created(Response $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Response "updated" event.
     */
    public function updated(Response $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Response "deleted" event.
     */
    public function deleted(Response $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Response "restored" event.
     */
    public function restored(Response $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Response "force deleted" event.
     */
    public function forceDeleted(Response $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
