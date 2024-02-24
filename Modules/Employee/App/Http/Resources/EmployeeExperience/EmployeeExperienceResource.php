<?php

namespace App\Http\Resources\EmployeeExperience;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeExperienceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'level_of_education_id' => $this->level_of_education_id,

            'nama_kegiatan' => $this->nama_kegiatan,
            'nama_perusahaan' => $this->nama_perusahaan,
            'lokasi_kegiatan' => $this->lokasi_kegiatan,
            'pengguna_jasa' => $this->pengguna_jasa,
            'uraian_tugas' => $this->uraian_tugas,
            'waktu_pelaksanaan_mulai' => $this->waktu_pelaksanaan_mulai->isoFormat('LL'),
            'waktu_pelaksanaan_selesai' => $this->waktu_pelaksanaan_selesai->isoFormat('LL'),
            'posisi_penugasan' => $this->posisi_penugasan,
            'status_kepegawaian' => $this->status_kepegawaian,
            'foto_surat_referensi' => $this->foto_surat_referensi,
            'note' => $this->note,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),
            'level_of_education' => $this->levelOfEducation,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
