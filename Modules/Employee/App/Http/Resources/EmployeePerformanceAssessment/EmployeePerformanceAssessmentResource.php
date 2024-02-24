<?php

namespace App\Http\Resources\EmployeePerformanceAssessment;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeePerformanceAssessmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'poin' => $this->poin,
            'employee_performance_assessment_id' => $this->employee_performance_assessment_id,
            'superior_id' => $this->superior_id,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
