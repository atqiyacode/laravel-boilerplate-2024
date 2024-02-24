<?php

namespace Modules\Project\App\Observers;

use Modules\Project\App\Events\ProjectEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Project\App\Models\Project;

class ProjectObserver
{
    /**
     * Dispatch events and log activities when the Project is created, updated, deleted, restored, or force deleted.
     *
     * @param\Modules\Project\App\ModelsProject $data
     */
    protected function handleEventAndLogActivity(Project $data): void
    {
        ProjectEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
