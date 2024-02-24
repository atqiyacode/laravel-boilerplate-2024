<?php

namespace Modules\JobApplication\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class JobApplicationFilters extends QueryFilters
{
    public function trashed($term)
    {
        $params = $this->convertStringToBoolean($term);
        $this->builder->where(function ($query) use ($params) {
            $query->when($params, function ($query) {
                $query->whereNotNull('deleted_at');
            }, function ($query) {
                $query->whereNull('deleted_at');
            });
        });
    }

    private function convertStringToBoolean($value)
    {
        $lowercaseValue = strtolower($value);

        if ($lowercaseValue === 'true' || $lowercaseValue === '1') {
            return true;
        } elseif ($lowercaseValue === 'false' || $lowercaseValue === '0') {
            return false;
        }
        return null;
    }
    protected array $allowedFilters = [
        'id',
        'user_id',
        'job_vacancy_id',
        'applicant_resume_id',
        'created_at',
        'updated_at',
        'status'
    ];

    protected array $columnSearch = [
        //
    ];

    protected array $allowedSorts = [
        'id',
        'user_id',
        'job_vacancy_id',
        'applicant_resume_id',
        'keterangan',
        'referal',
        'created_at',
        'updated_at',
        'status'
    ];

    protected array $relationSearch = [
        'jobVacancies' => [
            'title',
        ],
        'applicantResume' => ['nik'],
        'user' => ['nik'],
    ];

    public function status($statusId)
    {
        $this->builder->whereHas('jobApplicationStatus', function ($jobApplicationStatusSubquery) use ($statusId) {
            $jobApplicationStatusSubquery->where('id', $statusId);
        });
    }
}
