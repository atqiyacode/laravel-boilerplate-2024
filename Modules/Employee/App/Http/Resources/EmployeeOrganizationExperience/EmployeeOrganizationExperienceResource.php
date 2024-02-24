<?php

namespace App\Http\Resources\EmployeeOrganizationExperience;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeOrganizationExperienceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'nama_organisasi' => $this->nama_organisasi,
            'posisi' => $this->posisi,
            'jenis_organisasi' => $this->jenis_organisasi,
            'tahun_mulai' => $this->tahun_mulai,
            'tahun_selesai' => $this->tahun_selesai,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
