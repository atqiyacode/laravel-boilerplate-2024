<?php

namespace Modules\User\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class UserVerificationCodeFilters extends QueryFilters
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
        'verification_code_type_id',
    ];

    protected array $columnSearch = [
        'token_code',
        'expired_at',
    ];

    protected array $allowedSorts = [
        'id',
        'user_id',
        'verification_code_type_id',
        'token_code',
        'expired_at',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'user' => ['name', 'username', 'email'],
        'verificationCodeType' => ['name'],
    ];
}
