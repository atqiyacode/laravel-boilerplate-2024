<?php

namespace Modules\JobApplication\App\Http\Resources\JobApplication;

use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'job_vacancy_id' => $this->job_vacancy_id,
            'applicant_resume_id' => $this->applicant_resume_id,

            'status' => (bool) $this->status,
            'keterangan' => $this->keterangan,
            'referal' => $this->referal,

            'jobVacancy' => $this->jobVacancy,
            'applicantResume' => $this->applicantResume,
            'user' => $this->user,

        ];
    }
}
