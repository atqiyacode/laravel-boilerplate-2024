<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantAttachment;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantAttachmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'foto_ktp' => $this->foto_ktp,
            'foto_npwp' => $this->foto_npwp,
            'foto_pasfoto' => $this->foto_pasfoto,
            'foto_selfie' => $this->foto_selfie,
            'foto_kswp' => $this->foto_kswp,
            'foto_cv' => $this->foto_cv,

            'applicantResume' => $this->applicantResume,
            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
