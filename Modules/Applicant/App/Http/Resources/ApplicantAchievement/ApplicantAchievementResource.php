<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantAchievement;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantAchievementResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'nama_kegiatan' => $this->nama_kegiatan,
            'tahun' => $this->tahun,
            'skala' => $this->skala,
            'foto_dokumen' => $this->foto_dokumen,

            'applicantResume' => $this->applicantResume,
            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
