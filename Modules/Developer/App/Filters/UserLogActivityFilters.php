<?php

namespace Modules\Developer\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class UserLogActivityFilters extends QueryFilters
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
        'user_id',
        'log_date',
        'table_name',
        'log_type',
    ];

    protected array $columnSearch = [
        'log_date',
        'table_name',
        'log_type',
        'data',
    ];

    protected array $allowedSorts = [
        'id',
        'log_date',
        'table_name',
        'log_type',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'user' => ['name', 'username', 'email'],
    ];
}
