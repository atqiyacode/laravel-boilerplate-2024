<?php

namespace Modules\DynamicForm\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class FormPraRegistrationFilters extends QueryFilters
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
        'project_id',
        'form_question_pra_registration_id',
        'batch',
        'wilayah_tugas',
        'ingin_malanjutkan_pekerjaan',
        'ingin_posisi_yang_sama',
        'komitmen',
        'ketentuan',
        'kendala',
        'kesan_pesan',
        'kritik_saran',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'applicant_resume_id',
        'project_id',
        'form_question_pra_registration_id',
        'batch',
        'wilayah_tugas',
        'ingin_malanjutkan_pekerjaan',
        'ingin_posisi_yang_sama',
        'komitmen',
        'ketentuan',
        'kendala',
        'kesan_pesan',
        'kritik_saran',
    ];

    protected array $allowedSorts = [
        'id',
        'applicant_resume_id',
        'project_id',
        'form_question_pra_registration_id',
        'batch',
        'wilayah_tugas',
        'ingin_malanjutkan_pekerjaan',
        'ingin_posisi_yang_sama',
        'komitmen',
        'ketentuan',
        'kendala',
        'kesan_pesan',
        'kritik_saran',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'applicantResume' => [
            'nik',
            'full_name',
        ],
        'project' => [
            'name'
        ],
        'formQuestionPraRegistration' => [
            'batch',
            'wilayah_tugas',
        ],
    ];
}
