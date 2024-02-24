<?php

namespace Modules\KeyPerformanceIndicator\Http\Resources\PerformanceAssessment;

use Illuminate\Http\Resources\Json\JsonResource;

class PerformanceAssessmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'poin' => $this->poin,
            'note' => $this->note,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
