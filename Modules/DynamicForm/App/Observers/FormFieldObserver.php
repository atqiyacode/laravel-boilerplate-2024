<?php

namespace Modules\DynamicForm\App\Observers;

use Modules\DynamicForm\App\Events\FormFieldEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\DynamicForm\App\Models\FormField;

class FormFieldObserver
{
    /**
     * Dispatch events and log activities when the FormField is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\FormField $data
     */
    protected function handleEventAndLogActivity(FormField $data): void
    {
        FormFieldEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the FormField "created" event.
     */
    public function created(FormField $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormField "updated" event.
     */
    public function updated(FormField $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormField "deleted" event.
     */
    public function deleted(FormField $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormField "restored" event.
     */
    public function restored(FormField $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormField "force deleted" event.
     */
    public function forceDeleted(FormField $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
