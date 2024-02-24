<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantExperience;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantExperienceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'level_of_education_id' => $this->level_of_education_id,
            'nama_kegiatan' => $this->nama_kegiatan,
            'nama_perusahaan' => $this->nama_perusahaan,
            'lokasi_kegiatan' => $this->lokasi_kegiatan,
            'pengguna_jasa' => $this->pengguna_jasa,
            'uraian_tugas' => $this->uraian_tugas,
            'waktu_pelaksanaan_mulai' => ($this->waktu_pelaksanaan_mulai),
            'waktu_pelaksanaan_selesai' => ($this->waktu_pelaksanaan_selesai),
            'posisi_penugasan' => $this->posisi_penugasan,
            'status_kepegawaian' => $this->status_kepegawaian,
            'foto_surat_referensi' => $this->foto_surat_referensi,
            'note' => $this->note,

            'applicantResume' => $this->applicantResume,
            'levelOfEducation' => $this->levelOfEducation,
            'total_months_experience' => $this->total_months_experience,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
