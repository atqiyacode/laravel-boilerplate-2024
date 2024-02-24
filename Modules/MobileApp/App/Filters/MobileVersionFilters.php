<?php

namespace Modules\MobileApp\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class MobileVersionFilters extends QueryFilters
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
        'status',
    ];

    protected array $columnSearch = [
        'version',
        'version_code',
        'note',
        'device',
        'package_file',
        'download_link',
    ];

    protected array $allowedSorts = [
        'id',
        'version',
        'version_code',
        'note',
        'device',
        'package_file',
        'download_link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
