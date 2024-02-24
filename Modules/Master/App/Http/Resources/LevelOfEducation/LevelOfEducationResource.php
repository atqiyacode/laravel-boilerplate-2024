<?php

namespace Modules\Master\App\Http\Resources\LevelOfEducation;

use Illuminate\Http\Resources\Json\JsonResource;

class LevelOfEducationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => (bool) $this->status,
            'employees_count' => (int) $this->employees_count,
            'applicants_count' => (int) $this->applicants_count,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
