<?php

namespace Modules\Master\App\Observers;

use Modules\Master\App\Events\StudyProgramEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Master\App\Models\StudyProgram;

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
