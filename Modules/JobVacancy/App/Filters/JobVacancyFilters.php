<?php

namespace Modules\JobVacancy\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class JobVacancyFilters extends QueryFilters
{
    public function status($term)
    {
        $params = $this->convertStringToBoolean($term);
        $this->builder->where(function ($query) use ($params) {
            $query->whereStatus($params);
        });
    }

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
        'slug',
        'title',
        'general_qualifications',
        'job_description',
        'type',
        'open_date',
        'close_date',
        'project_id',
        'position_id',
    ];

    protected array $columnSearch = [
        'slug',
        'title',
        'general_qualifications',
        'job_description',
        'type',
        'open_date',
        'close_date',
        'project_id',
        'position_id',
    ];

    protected array $allowedSorts = [
        'id',
        'slug',
        'title',
        'general_qualifications',
        'job_description',
        'type',
        'open_date',
        'close_date',
        'project_id',
        'position_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',

        'jobApplications_count',
    ];

    protected array $relationSearch = [
        'position' => ['name'],
        'project' => ['name'],
    ];
}
