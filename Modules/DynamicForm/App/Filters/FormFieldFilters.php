<?php

namespace Modules\DynamicForm\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class FormFieldFilters extends QueryFilters
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
        'form_id',
        'type',
        'label',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'form_id',
        'type',
        'label',
    ];

    protected array $allowedSorts = [
        'id',
        'form_id',
        'type',
        'label',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'form' => [
            'title',
        ],
        'form.project' => ['name'],
    ];

    public function project_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('form', function ($query) use ($term) {
                $query->where('project_id', $term);
            });
        });
    }
}
