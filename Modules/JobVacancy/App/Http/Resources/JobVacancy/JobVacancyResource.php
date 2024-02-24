<?php

namespace Modules\JobVacancy\App\Http\Resources\JobVacancy;

use App\Http\Resources\DateFormat\DateFormatResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\HRMaster\App\Http\Resources\Position\PositionResource;
use Modules\Project\App\Http\Resources\Project\SimpleProjectResource;

class JobVacancyResource extends JsonResource
{
    public function toArray($request): array
    {
        $data =  [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,

            'status' => (bool) $this->status,

            'position_id' => $this->position_id,
            'project_id' => $this->project_id,

            'open_date' => $this->open_date->format('Y-m-d'),
            'close_date' => $this->close_date->format('Y-m-d'),

            'project' => new SimpleProjectResource($this->project),
            'position' => new PositionResource($this->position),
            'open_date_formatted' => new DateFormatResource($this->open_date),
            'close_date_formatted' => new DateFormatResource($this->close_date),

            'job_application_count' => $this->jobApplications->whereNotIn('status', [5, 6])->count(),

            'general_qualifications' => $this->when(request()->route()->getName() !== 'jobVacancies.index', function () {
                return $this->general_qualifications;
            }),

            'job_description' => $this->when(request()->route()->getName() !== 'jobVacancies.index', function () {
                return $this->job_description;
            }),

            'created' => $this->when(request()->route()->getName() !== 'jobVacancies.index', function () {
                return new DateFormatResource($this->created_at);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),

        ];

        return $data;
    }
}
