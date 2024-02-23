<?php

namespace Modules\Employee\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class EmployeeAttendanceFilters extends QueryFilters
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
        'check_date',
        'employee_id',
    ];

    protected array $columnSearch = [
        'check_date',
        'check_in',
        'check_out',
        'photo_check_in',
        'photo_check_out',
        'location_check_in',
        'location_check_out',
        'note',
    ];

    protected array $allowedSorts = [
        'id',
        'check_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'employee' => ['full_name', 'nik'],
    ];

    public function month($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereYear('check_date', '=', date('Y', strtotime($term)))
                ->whereMonth('check_date', '=', date('m', strtotime($term)));
        });
    }
    public function nik($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('nik', $term);
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
