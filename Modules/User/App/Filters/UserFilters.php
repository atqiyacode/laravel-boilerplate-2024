<?php

namespace Modules\User\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class UserFilters extends QueryFilters
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
        'email_verified_at',
        'active_status',
        'dark_mode'
    ];

    protected array $columnSearch = [
        'name',
        'username',
        'email',
        'avatar',
        'api_key',
        'active_status',
        'dark_mode',
        'messenger_color',
    ];

    protected array $allowedSorts = [
        'id',
        'name',
        'username',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
