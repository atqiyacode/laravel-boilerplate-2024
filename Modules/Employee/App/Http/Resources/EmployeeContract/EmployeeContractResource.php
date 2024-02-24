<?php

namespace App\Http\Resources\EmployeeContract;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeContractResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,

            'project_id' => $this->project_id,
            'employee_id' => $this->employee_id,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'project' => $this->project,

            'nama_paket' => $this->nama_paket,
            'kode_sirup' => $this->kode_sirup,
            'nomor_permohonan_pengadaan' => $this->nomor_permohonan_pengadaan,
            'tanggal_permohonan_pengadaan' => $this->tanggal_permohonan_pengadaan,
            'no_und_dpl' => $this->no_und_dpl,
            'tanggal_und_dpl' => $this->tanggal_und_dpl,
            'no_ba_hpl' => $this->no_ba_hpl,
            'tanggal_ba_hpl' => $this->tanggal_ba_hpl,
            'no_sppbj' => $this->no_sppbj,
            'tanggal_sppbj' => $this->tanggal_sppbj,
            'no_spk' => $this->no_spk,
            'tanggal_spk' => $this->tanggal_spk,
            'no_spmk' => $this->no_spmk,
            'tanggal_spmk' => $this->tanggal_spmk,
            'no_adendum_spk' => $this->no_adendum_spk,
            'tanggal_adendum_spk' => $this->tanggal_adendum_spk,
            'kegiatan' => $this->kegiatan,
            'sub_kegiatan' => $this->sub_kegiatan,
            'penugasan' => $this->penugasan,
            'status' => (bool) $this->status,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
