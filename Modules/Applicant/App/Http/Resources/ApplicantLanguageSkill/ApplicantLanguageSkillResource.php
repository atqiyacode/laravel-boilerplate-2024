<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantLanguageSkill;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantLanguageSkillResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'bahasa' => $this->bahasa,

            'kemampuan_lisan' => (int) $this->kemampuan_lisan,
            'kemampuan_tulisan' => (int) $this->kemampuan_tulisan,

            'kemampuan_lisan_rank' => $this->scoreName($this->kemampuan_lisan),
            'kemampuan_tulisan_rank' => $this->scoreName($this->kemampuan_tulisan),

            'applicantResume' => $this->applicantResume,
            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }

    public function scoreName($score = 0)
    {
        if ($score >= 90) {
            return trans('Excellent');
        } elseif ($score >= 70) {
            return trans('Good');
        } elseif ($score >= 50) {
            return trans('Average');
        } elseif ($score >= 30) {
            return trans('Below Average');
        } else {
            return trans('Needs Improvement');
        }
    }
}
