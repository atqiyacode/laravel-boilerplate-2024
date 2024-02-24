<?php

namespace Modules\JobVacancy\App\Http\Resources\JobVacancy;

use App\Http\Resources\DateFormat\DateFormatResource;
use Modules\JobVacancy\App\Http\Resources\Position\PositionResource;
use Modules\JobVacancy\App\Http\Resources\Project\SimpleProjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicJobVacancyResource extends JsonResource
{
    public function toArray($request): array
    {
        $data =  [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'type' => $this->type,

            'status' => (bool) $this->status,

            'position_id' => $this->position_id,
            'project_id' => $this->project_id,

            // 'project' => new SimpleProjectResource($this->project),
            'position' => new PositionResource($this->position),
            'open_date' => new DateFormatResource($this->open_date),
            'close_date' => new DateFormatResource($this->close_date),

            'is_expired' => (bool) now()->gt($this->close_date),

            'is_applied' => $this->when(auth()->check(), function () {
                return (bool) $this->is_applied;
            }),

            'job_application_count' => $this->jobApplications->whereNotIn('status', [5, 6])->count(),

            'general_qualifications' => $this->when(request()->route()->getName() === 'public.jobVacancy.show' || request()->route()->getName() === 'career.jobVacancy.show', function () {
                return $this->general_qualifications;
            }),

            'job_description' => $this->when(request()->route()->getName() === 'public.jobVacancy.show' || request()->route()->getName() === 'career.jobVacancy.show', function () {
                return $this->job_description;
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),

        ];

        return $data;
    }
}
