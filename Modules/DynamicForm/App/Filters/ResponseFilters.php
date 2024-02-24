<?php

namespace Modules\DynamicForm\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ResponseFilters extends QueryFilters
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
        'form_id',
        'applicant_resume_id',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'form_id',
        'applicant_resume_id',
    ];

    protected array $allowedSorts = [
        'id',
        'form_id',
        'applicant_resume_id',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'form' => [
            'title',
            'description',
        ],
        'form.project' => [
            'name',
        ],
        'applicantResume' => [
            'nik',
            'full_name',
        ],
    ];
}
