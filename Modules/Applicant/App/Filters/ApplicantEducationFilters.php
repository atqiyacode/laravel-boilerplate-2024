<?php

namespace Modules\Applicant\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ApplicantEducationFilters extends QueryFilters
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
        'level_of_education_id',
        'applicant_resume_id',
        'ptn_pts',
        'nama_institusi',
        'fakultas',
        'jurusan',
        'npm',
        'ipk',
        'no_ijazah',
        'tahun_masuk',
        'tahun_lulus',
        'status_berkas',
        'status_kelulusan',
        'foto_ijazah',
        'foto_transkrip_nilai',
        'link_dikti',
        'foto_screenshot_dikti',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'level_of_education_id',
        'applicant_resume_id',
        'ptn_pts',
        'nama_institusi',
        'fakultas',
        'jurusan',
        'npm',
        'ipk',
        'no_ijazah',
        'tahun_masuk',
        'tahun_lulus',
        'status_berkas',
        'status_kelulusan',
        'foto_ijazah',
        'foto_transkrip_nilai',
        'link_dikti',
        'foto_screenshot_dikti',
    ];

    protected array $allowedSorts = [
        'id',
        'level_of_education_id',
        'applicant_resume_id',
        'ptn_pts',
        'nama_institusi',
        'fakultas',
        'jurusan',
        'npm',
        'ipk',
        'no_ijazah',
        'tahun_masuk',
        'tahun_lulus',
        'status_berkas',
        'status_kelulusan',
        'foto_ijazah',
        'foto_transkrip_nilai',
        'link_dikti',
        'foto_screenshot_dikti',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'applicantResume' => [
            'nik',
            'nama_lengkap',
        ],
        'levelOfEducation' => [
            'name',
        ],

    ];
}
