<?php

namespace Modules\Master\App\Http\Resources\StudyProgram;

use Illuminate\Http\Resources\Json\JsonResource;

class StudyProgramResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'id_prodi' => $this->id_prodi,
            'kode_prodi' => $this->kode_prodi,

        ];
    }
}
