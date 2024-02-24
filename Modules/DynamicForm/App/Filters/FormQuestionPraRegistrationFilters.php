<?php

namespace Modules\DynamicForm\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class FormQuestionPraRegistrationFilters extends QueryFilters
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
        'project_id',
        'batch',
        'wilayah_tugas',
        'ingin_malanjutkan_pekerjaan',
        'ingin_posisi_yang_sama',
        'komitmen',
        'ketentuan',
        'kendala',
        'kesan_pesan',
        'kritik_saran',
        'other_fields',
        'created_at',
        'updated_at'
    ];

    protected array $columnSearch = [
        'project_id',
        'batch',
        'wilayah_tugas',
        'ingin_malanjutkan_pekerjaan',
        'ingin_posisi_yang_sama',
        'komitmen',
        'ketentuan',
        'kendala',
        'kesan_pesan',
        'kritik_saran',
        'other_fields',
    ];

    protected array $allowedSorts = [
        'id',
        'project_id',
        'batch',
        'wilayah_tugas',
        'ingin_malanjutkan_pekerjaan',
        'ingin_posisi_yang_sama',
        'komitmen',
        'ketentuan',
        'kendala',
        'kesan_pesan',
        'kritik_saran',
        'other_fields',
        'created_at',
        'updated_at',
    ];

    protected array $relationSearch = [
        'project' => [
            'name',
        ],
    ];
}
