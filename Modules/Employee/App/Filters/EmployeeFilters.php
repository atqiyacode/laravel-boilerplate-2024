<?php

namespace Modules\Employee\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class EmployeeFilters extends QueryFilters
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
        'gender_id',
        'religion_id',
        'field_of_work_id',
        'working_area_id',
        'employee_type_id',
    ];

    protected array $columnSearch = [
        'nik',
        'full_name',
        'tempat_lahir',
        'tanggal_lahir',
    ];

    protected array $relationSearch = [
        'gender' => ['name'],
        'religion' => ['name'],
        'fieldOfWork' => ['name'],
        'workingArea' => ['name'],
        'position' => ['name'],
        'employeeType' => ['name'],
        'unit' => ['name'],
    ];

    protected array $allowedSorts = [
        'id',
        'nik',
        'full_name',
        'tanggal_lahir',
    ];

    protected array $allowedIncludes = [
        'gender',
        'religion',
        'fieldOfWork',
        'workingArea',
        'employeeDetail',
        'employeeContact',
        'employeeContract',
        'employeeEmergencyContact',
    ];

    public function position_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('position_id', $term);
        });
    }
    public function unit_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('unit_id', $term);
        });
    }
    public function employee_type_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('employee_type_id', $term);
        });
    }
    public function working_area_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('working_area_id', $term);
        });
    }
    public function field_of_work_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('field_of_work_id', $term);
        });
    }
}
