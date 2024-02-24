<?php

namespace App\Observers;

use App\Events\StudyProgramEvent;
use App\Events\UserLogActivityEvent;
use App\Models\StudyProgram;

class StudyProgramObserver
{
    /**
     * Dispatch events and log activities when the StudyProgram is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\StudyProgram $data
     */
    protected function handleEventAndLogActivity(StudyProgram $data): void
    {
        StudyProgramEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the StudyProgram "created" event.
     */
    public function created(StudyProgram $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the StudyProgram "updated" event.
     */
    public function updated(StudyProgram $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the StudyProgram "deleted" event.
     */
    public function deleted(StudyProgram $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the StudyProgram "restored" event.
     */
    public function restored(StudyProgram $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the StudyProgram "force deleted" event.
     */
    public function forceDeleted(StudyProgram $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
