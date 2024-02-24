<?php

namespace App\Http\Resources\EmployeeEducation;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeEducationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'level_of_education_id' => $this->level_of_education_id,
            'ptn_pts' => $this->ptn_pts,
            'nama_institusi' => $this->nama_institusi,
            'fakultas' => $this->fakultas,
            'jurusan' => $this->jurusan,
            'npm' => $this->npm,
            'ipk' => $this->ipk,
            'no_ijazah' => $this->no_ijazah,
            'tahun_masuk' => $this->tahun_masuk,
            'tahun_lulus' => $this->tahun_lulus,
            'status_berkas' => $this->status_berkas,
            'status_kelulusan' => $this->status_kelulusan,
            'foto_ijazah' => $this->foto_ijazah,
            'foto_transkrip_nilai' => $this->foto_transkrip_nilai,
            'link_dikti' => $this->link_dikti,
            'foto_screenshot_dikti' => $this->foto_screenshot_dikti,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
