<?php

namespace Modules\DynamicForm\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class OptionFilters extends QueryFilters
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
        'form_field_id',
        'value',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'form_field_id',
        'value',
    ];

    protected array $allowedSorts = [
        'id',
        'form_field_id',
        'value',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'formField' => [
            'type',
            'label',
        ],
        'formField.title' => ['title'],
    ];
}
