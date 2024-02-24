<?php

namespace App\Http\Resources\EmployeeRelationReference;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeRelationReferenceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'no_telf' => $this->no_telf,
            'hubungan' => $this->hubungan,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
