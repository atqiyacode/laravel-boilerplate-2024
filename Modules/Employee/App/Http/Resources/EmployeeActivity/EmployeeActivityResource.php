<?php

namespace Modules\Employee\App\Http\Resources\EmployeeActivity;

use Modules\Employee\App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeActivityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'date_of_activity' => $this->date_of_activity->isoFormat('LLLL'),
            'detail' => $this->detail,
            'attachment' => $this->attachment,
            'employee_id' => $this->employee_id,
            'type_of_activity_id' => $this->type_of_activity_id,
            'note' => $this->note,
            'typeOfActivity' => $this->typeOfActivity,
            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
