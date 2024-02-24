<?php

namespace Modules\Employee\App\Observers;

use Modules\Employee\App\Events\EmployeeCertificateOfExpertiseEvent;
use Modules\Developer\App\Events\UserLogActivityEvent;
use Modules\Employee\App\Models\EmployeeCertificateOfExpertise;

class EmployeeCertificateOfExpertiseObserver
{
    /**
     * Dispatch events and log activities when the EmployeeCertificateOfExpertise is created, updated, deleted, restored, or force deleted.
     *
     * @param \App\Models\EmployeeCertificateOfExpertise $data
     */
    protected function handleEventAndLogActivity(EmployeeCertificateOfExpertise $data): void
    {
        EmployeeCertificateOfExpertiseEvent::dispatch($data);
        UserLogActivityEvent::dispatch('new update');
    }
    /**
     * Handle the EmployeeCertificateOfExpertise "created" event.
     */
    public function created(EmployeeCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeCertificateOfExpertise "updated" event.
     */
    public function updated(EmployeeCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeCertificateOfExpertise "deleted" event.
     */
    public function deleted(EmployeeCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeCertificateOfExpertise "restored" event.
     */
    public function restored(EmployeeCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }

    /**
     * Handle the EmployeeCertificateOfExpertise "force deleted" event.
     */
    public function forceDeleted(EmployeeCertificateOfExpertise $data): void
    {
        $this->handleEventAndLogActivity($data);
    }
}
