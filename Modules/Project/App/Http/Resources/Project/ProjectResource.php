<?php

namespace Modules\Project\App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,

            'start_date' => $this->start_date->format('Y-m-d') ?? null,
            'end_date' => $this->end_date->format('Y-m-d') ?? null,

            'start_date_formatted' => $this->start_date->isoFormat('dddd, LL') ?? null,
            'end_date_formatted' => $this->end_date->isoFormat('dddd, LL') ?? null,

            'max_apply' => $this->max_apply - $this->totalAppliedJob(),

            'status' => (bool) $this->status,

            'job_vacancies' => $this->jobVacancies,
            'job_vacancies_count' => $this->job_vacancies_count,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),

        ];
    }
}
