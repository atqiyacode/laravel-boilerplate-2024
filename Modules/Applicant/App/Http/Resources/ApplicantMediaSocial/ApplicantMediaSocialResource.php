<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantMediaSocial;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantMediaSocialResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'nama_media' => $this->nama_media,
            'link' => $this->link,

            'applicantResume' => $this->applicantResume,
            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
