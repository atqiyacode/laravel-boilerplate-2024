<?php

namespace Modules\Employee\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class EmployeeActivityFilters extends QueryFilters
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
        'employee_id',
        'type_of_activity_id',
    ];

    protected array $columnSearch = [
        'date_of_activity',
        'detail',
        'attachment',
        'note',
    ];

    protected array $allowedSorts = [
        'id',
        'date_of_activity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'employee' => [
            'nik',
            'full_name',
        ],
        'employee.workingArea' => ['name'],
        'employee.fieldOfWork' => ['name'],
        'typeOfActivity' => ['name'],
    ];

    public function month($term)
    {
        $this->builder->whereMonth('date_of_activity', $term);
    }
}
