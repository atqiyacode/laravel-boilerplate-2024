<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantOrganizationExperience;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantOrganizationExperienceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'nama_organisasi' => $this->nama_organisasi,
            'posisi' => $this->posisi,
            'jenis_organisasi' => $this->jenis_organisasi,
            'tahun_mulai' => $this->tahun_mulai,
            'tahun_selesai' => $this->tahun_selesai,

            'applicantResume' => $this->applicantResume,
            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
