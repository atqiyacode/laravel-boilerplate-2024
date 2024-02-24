<?php

namespace Modules\Employee\App\Http\Resources\EmployeePermitStructure;

use Modules\Employee\App\Http\Resources\Employee\SimpleEmployeeResource;
use Modules\Employee\App\Http\Resources\Position\PositionResource;
use Modules\Employee\App\Http\Resources\WorkingArea\WorkingAreaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeePermitStructureResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'position_id' => $this->position_id,
            'working_area_id' => $this->working_area_id,
            'approval_1' => $this->approval_1,
            'approval_2' => $this->approval_2,

            'position' => new PositionResource($this->position),
            'working_area' => new WorkingAreaResource($this->workingArea),
            'approval1' => new PositionResource($this->approval1),
            'approval2' => new PositionResource($this->approval2),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
