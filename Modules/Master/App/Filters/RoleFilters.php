<?php

namespace Modules\Master\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class RoleFilters extends QueryFilters
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
        'guard_name',
    ];

    protected array $columnSearch = [
        'name',
        'guard_name'
    ];

    protected array $allowedSorts = [
        'id',
        'name',
        'guard_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasPermissions($term)
    {
        $params = $this->convertStringToBoolean($term);
        $this->builder->where(function ($query) use ($params) {
            $query->when($params, function ($query) {
                $query->whereHas('permissions');
            }, function ($query) {
                $query->whereDoesntHave('permissions');
            });
        });
    }
}
