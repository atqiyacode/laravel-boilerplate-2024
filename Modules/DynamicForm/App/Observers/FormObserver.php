<?php

namespace Modules\DynamicForm\App\Observers;

use Modules\DynamicForm\App\Events\FormEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\DynamicForm\App\Models\Form;

class FormObserver
{
    /**
     * Dispatch events and log activities when the Form is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\Form $data
     */
    protected function handleEventAndLogActivity(Form $data): void
    {
        FormEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Form "created" event.
     */
    public function created(Form $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Form "updated" event.
     */
    public function updated(Form $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Form "deleted" event.
     */
    public function deleted(Form $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Form "restored" event.
     */
    public function restored(Form $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Form "force deleted" event.
     */
    public function forceDeleted(Form $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
