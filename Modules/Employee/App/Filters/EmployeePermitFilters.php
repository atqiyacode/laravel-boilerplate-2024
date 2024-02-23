<?php

namespace Modules\Employee\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class EmployeePermitFilters extends QueryFilters
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
        'type_of_permit_id',
        'permit_status_id',
        'employee_id',
    ];

    protected array $columnSearch = [
        'start_date',
        'end_date',
        'note',
    ];

    protected array $allowedSorts = [
        'id',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'employee' => ['full_name', 'nik'],
        'typeOfPermit' => ['name'],
        'permitStatus' => ['name'],
    ];

    public function permit_status_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('permitStatus', function ($query) use ($term) {
                $query->where('permit_status_id', $term);
            });
        });
    }
    public function type_of_permit_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('typeOfPermit', function ($query) use ($term) {
                $query->where('type_of_permit_id', $term);
            });
        });
    }
    public function position_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('position_id', $term);
            });
        });
    }
    public function unit_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('unit_id', $term);
            });
        });
    }
    public function employee_type_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('employee_type_id', $term);
            });
        });
    }
    public function working_area_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('working_area_id', $term);
            });
        });
    }
    public function field_of_work_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('field_of_work_id', $term);
            });
        });
    }
}
