<?php

namespace App\Http\Resources\EmployeeAchievement;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeAchievementResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'nama_kegiatan' => $this->nama_kegiatan,
            'tahun' => $this->tahun,
            'skala' => $this->skala,
            'foto_dokumen' => $this->foto_dokumen,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),

        ];
    }
}
