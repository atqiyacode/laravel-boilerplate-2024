<?php

namespace Modules\Employee\App\Http\Resources\EmployeePermitRemaining;

use Modules\Employee\App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeePermitRemainingResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'has_use' => $this->has_use,
            'limit' => $this->limit,
            'total' => $this->total,
            'note' => $this->note,
            'employee_id' => $this->employee_id,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
