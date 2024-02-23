<?php

namespace Modules\Employee\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class EmployeePermitStructureFilters extends QueryFilters
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
        'position_id',
        'approval_1',
        'approval_2',
        'working_area_id'
    ];

    protected array $columnSearch = [
        'position_id',
        'approval_1',
        'approval_2',
        'working_area_id'
    ];

    protected array $allowedSorts = [
        'id',
        'position_id',
        'approval_1',
        'approval_2',
        'working_area_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'position' => ['name'],
        'workingArea' => ['name'],
        'approval1' => ['name'],
        'approval2' => ['name'],
    ];

    public function position_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('position_id', $term);
        });
    }

    public function working_area_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('working_area_id', $term);
        });
    }

    public function approval_1($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('position_id', $term);
        });
    }

    public function approval_2($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->where('position_id', $term);
        });
    }
}
