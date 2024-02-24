<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantRelationReference;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantRelationReferenceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'no_telf' => $this->no_telf,
            'hubungan' => $this->hubungan,

            'applicantResume' => $this->applicantResume,
            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
