<?php

namespace App\Http\Resources\EmployeeAttachment;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeAttachmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'foto_ktp' => $this->foto_ktp,
            'foto_npwp' => $this->foto_npwp,
            'foto_pasfoto' => $this->foto_pasfoto,
            'foto_selfie' => $this->foto_selfie,
            'foto_kswp' => $this->foto_kswp,
            'foto_cv' => $this->foto_cv,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
