<?php

namespace Modules\Applicant\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ApplicantAttachmentFilters extends QueryFilters
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
        'applicant_resume_id',
        'foto_ktp',
        'foto_npwp',
        'foto_pasfoto',
        'foto_selfie',
        'foto_kswp',
        'foto_cv',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'applicant_resume_id',
        'foto_ktp',
        'foto_npwp',
        'foto_pasfoto',
        'foto_selfie',
        'foto_kswp',
        'foto_cv',
    ];

    protected array $allowedSorts = [
        'id',
        'applicant_resume_id',
        'foto_ktp',
        'foto_npwp',
        'foto_pasfoto',
        'foto_selfie',
        'foto_kswp',
        'foto_cv',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'applicantResume' => [
            'nik',
            'nama_lengkap',
        ],

    ];
}
