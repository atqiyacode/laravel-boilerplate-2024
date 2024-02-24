<?php

namespace Modules\Notification\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class TemplateNotificationFilters extends QueryFilters
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
        'notification_type_id',
    ];

    protected array $columnSearch = [
        'title',
        'message',
        'image',
        'attachment',
    ];

    protected array $allowedSorts = [
        'id',
        'title',
        'message',
        'image',
        'attachment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'notificationType' => ['name'],
        'user' => ['name', 'email', 'username'],
    ];
}
