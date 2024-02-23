<?php

namespace Modules\Applicant\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ApplicantResumeFilters extends QueryFilters
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
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_domisili',
        'alamat_ktp',
        'tentang_diri',
        'other_fields',
        'foto_ktp',
        'foto_npwp',
        'foto_pasfoto',
        'foto_selfie',
        'foto_kswp',
        'foto_cv',
        'user_id',
        'gender_id',
        'religion_id',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_domisili',
        'alamat_ktp',
        'tentang_diri',
        'other_fields',
        'foto_ktp',
        'foto_npwp',
        'foto_pasfoto',
        'foto_selfie',
        'foto_kswp',
        'foto_cv',
        'user_id',
        'gender_id',
        'religion_id',
    ];

    protected array $allowedSorts = [
        'id',
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_domisili',
        'alamat_ktp',
        'tentang_diri',
        'other_fields',
        'foto_ktp',
        'foto_npwp',
        'foto_pasfoto',
        'foto_selfie',
        'foto_kswp',
        'foto_cv',
        'user_id',
        'gender_id',
        'religion_id',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'user' => ['name', 'email', 'username'],
        'religion' => ['name'],
    ];
}
