<?php

namespace Modules\Master\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class CompanyInformationFilters extends QueryFilters
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
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        //
    ];

    protected array $allowedSorts = [
        'id',
        'created_at',
        'updated_at',
    ];

    // protected array $relationSearch = [
    //     'employee' => [
    //         'nik',
    //         'full_name',
    //     ],
    //     'employee.workingArea' => ['name'],
    // ];

    // public function custom($term)
    // {
    //     $this->builder->whereMonth('date_of_activity', $term);
    // }
}
