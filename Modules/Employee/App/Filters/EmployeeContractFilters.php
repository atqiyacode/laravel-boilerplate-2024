<?php

namespace Modules\Employee\App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class EmployeeContractFilters extends QueryFilters
{
    public function status($term)
    {
        $params = $this->convertStringToBoolean($term);
        $this->builder->where(function ($query) use ($params) {
            $query->whereStatus($params);
        });
    }

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
        'project_id',
        'employee_id',
        'nama_paket',
        'kode_sirup',
        'nomor_permohonan_pengadaan',
        'tanggal_permohonan_pengadaan',
        'no_und_dpl',
        'tanggal_und_dpl',
        'no_ba_hpl',
        'tanggal_ba_hpl',
        'no_sppbj',
        'tanggal_sppbj',
        'no_spk',
        'tanggal_spk',
        'no_spmk',
        'tanggal_spmk',
        'no_adendum_spk',
        'tanggal_adendum_spk',
        'kegiatan',
        'sub_kegiatan',
        'penugasan',
    ];

    protected array $columnSearch = [
        'project_id',
        'employee_id',
        'nama_paket',
        'kode_sirup',
        'nomor_permohonan_pengadaan',
        'tanggal_permohonan_pengadaan',
        'no_und_dpl',
        'tanggal_und_dpl',
        'no_ba_hpl',
        'tanggal_ba_hpl',
        'no_sppbj',
        'tanggal_sppbj',
        'no_spk',
        'tanggal_spk',
        'no_spmk',
        'tanggal_spmk',
        'no_adendum_spk',
        'tanggal_adendum_spk',
        'kegiatan',
        'sub_kegiatan',
        'penugasan',
    ];

    protected array $allowedSorts = [
        'id',
        'project_id',
        'employee_id',
        'nama_paket',
        'kode_sirup',
        'nomor_permohonan_pengadaan',
        'tanggal_permohonan_pengadaan',
        'no_und_dpl',
        'tanggal_und_dpl',
        'no_ba_hpl',
        'tanggal_ba_hpl',
        'no_sppbj',
        'tanggal_sppbj',
        'no_spk',
        'tanggal_spk',
        'no_spmk',
        'tanggal_spmk',
        'no_adendum_spk',
        'tanggal_adendum_spk',
        'kegiatan',
        'sub_kegiatan',
        'penugasan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $relationSearch = [
        'employee' => ['full_name', 'nik'],
        'project' => ['name'],
    ];

    public function position_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('position_id', $term);
            });
        });
    }
    public function unit_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('unit_id', $term);
            });
        });
    }
    public function employee_type_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('employee_type_id', $term);
            });
        });
    }
    public function working_area_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('working_area_id', $term);
            });
        });
    }
    public function field_of_work_id($term)
    {
        $this->builder->when($term, function ($query) use ($term) {
            $query->whereHas('employee', function ($query) use ($term) {
                $query->where('field_of_work_id', $term);
            });
        });
    }
}
