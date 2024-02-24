<?php

namespace Modules\DynamicForm\App\Observers;

use Modules\DynamicForm\App\Events\FormPraRegistrationEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\DynamicForm\App\Models\FormPraRegistration;

class FormPraRegistrationObserver
{
    /**
     * Dispatch events and log activities when the FormPraRegistration is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\FormPraRegistration $data
     */
    protected function handleEventAndLogActivity(FormPraRegistration $data): void
    {
        FormPraRegistrationEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the FormPraRegistration "created" event.
     */
    public function created(FormPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormPraRegistration "updated" event.
     */
    public function updated(FormPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormPraRegistration "deleted" event.
     */
    public function deleted(FormPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormPraRegistration "restored" event.
     */
    public function restored(FormPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormPraRegistration "force deleted" event.
     */
    public function forceDeleted(FormPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
