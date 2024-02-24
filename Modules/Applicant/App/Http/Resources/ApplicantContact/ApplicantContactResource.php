<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantContact;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantContactResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
            'applicant_resume_id' => $this->applicant_resume_id,

            'applicant_resume' => $this->applicantResume,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),

        ];
    }
}
