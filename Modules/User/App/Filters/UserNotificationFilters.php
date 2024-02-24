<?php

namespace Modules\User\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class UserNotificationFilters extends QueryFilters
{
    public function status($term)
    {
        $params = $this->convertStringToBoolean($term);
        $this->builder->where(function ($query) use ($params) {
            $query->whereStatus($params);
        });
    }

    public function archived($term)
    {
        $params = $this->convertStringToBoolean($term);
        $this->builder->where(function ($query) use ($params) {
            $query->whereArchived($params);
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
        'status',
        'user_id',
        'template_notification_id',
    ];

    protected array $columnSearch = [];

    protected array $allowedSorts = [
        'id',
        'status',
        'user_id',
        'template_notification_id',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'user' => ['name', 'username', 'email'],
        'templateNotification' => ['title', 'message'],
    ];
}
