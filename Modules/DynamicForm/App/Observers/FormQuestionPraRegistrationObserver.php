<?php

namespace Modules\DynamicForm\App\Observers;

use Modules\DynamicForm\App\Events\FormQuestionPraRegistrationEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\DynamicForm\App\Models\FormQuestionPraRegistration;

class FormQuestionPraRegistrationObserver
{
    /**
     * Dispatch events and log activities when the FormQuestionPraRegistration is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\FormQuestionPraRegistration $data
     */
    protected function handleEventAndLogActivity(FormQuestionPraRegistration $data): void
    {
        FormQuestionPraRegistrationEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the FormQuestionPraRegistration "created" event.
     */
    public function created(FormQuestionPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormQuestionPraRegistration "updated" event.
     */
    public function updated(FormQuestionPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormQuestionPraRegistration "deleted" event.
     */
    public function deleted(FormQuestionPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormQuestionPraRegistration "restored" event.
     */
    public function restored(FormQuestionPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the FormQuestionPraRegistration "force deleted" event.
     */
    public function forceDeleted(FormQuestionPraRegistration $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
