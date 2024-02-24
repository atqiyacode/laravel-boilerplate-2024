<?php

namespace Modules\Project\App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,

            'start_date' => $this->start_date->format('Y-m-d'),
            'end_date' => $this->end_date->format('Y-m-d'),

            'start_date_formatted' => $this->start_date->isoFormat('dddd, LL'),
            'end_date_formatted' => $this->end_date->isoFormat('dddd, LL'),

            'status' => (bool) $this->status,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
