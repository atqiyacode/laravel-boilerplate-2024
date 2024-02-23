<?php

namespace Modules\HRMaster\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class TypeOfPermitFilters extends QueryFilters
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
        'id',
        // 'status',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'name',
        'description',
    ];

    protected array $allowedSorts = [
        'id',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];
}
