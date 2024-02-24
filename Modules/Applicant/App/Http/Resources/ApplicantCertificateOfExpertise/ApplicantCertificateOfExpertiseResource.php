<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantCertificateOfExpertise;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantCertificateOfExpertiseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'nama_kegiatan' => $this->nama_kegiatan,
            'tahun' => $this->tahun,
            'penyelenggara' => $this->penyelenggara,
            'foto_sertifikat' => $this->foto_sertifikat,

            'applicantResume' => $this->applicantResume,
            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
