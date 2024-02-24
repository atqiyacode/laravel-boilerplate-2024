<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantEmergencyContact;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantEmergencyContactResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'applicant_resume_id' => $this->applicant_resume_id,

            'applicantResume' => $this->applicantResume,
            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
