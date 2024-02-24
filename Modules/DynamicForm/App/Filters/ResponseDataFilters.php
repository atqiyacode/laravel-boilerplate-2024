<?php

namespace Modules\DynamicForm\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ResponseDataFilters extends QueryFilters
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
        'response_id',
        'form_field_id',
        'option_id',
        'value',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'response_id',
        'form_field_id',
        'option_id',
        'value',
    ];

    protected array $allowedSorts = [
        'id',
        'response_id',
        'form_field_id',
        'option_id',
        'value',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'response' => [
            'full_name',
        ],
        'formField' => [
            'full_name',
        ],
    ];
}
