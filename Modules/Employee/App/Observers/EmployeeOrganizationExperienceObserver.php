<?php

namespace App\Observers;

use App\Events\EmployeeOrganizationExperienceEvent;
use App\Events\UserLogActivityEvent;
use App\Models\EmployeeOrganizationExperience;

class EmployeeOrganizationExperienceObserver
{
    /**
     * Dispatch events and log activities when the EmployeeOrganizationExperience is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeOrganizationExperience $data
     */
    protected function handleEventAndLogActivity(EmployeeOrganizationExperience $data): void
    {
        EmployeeOrganizationExperienceEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeOrganizationExperience "created" event.
     */
    public function created(EmployeeOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeOrganizationExperience "updated" event.
     */
    public function updated(EmployeeOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeOrganizationExperience "deleted" event.
     */
    public function deleted(EmployeeOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeOrganizationExperience "restored" event.
     */
    public function restored(EmployeeOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeOrganizationExperience "force deleted" event.
     */
    public function forceDeleted(EmployeeOrganizationExperience $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
