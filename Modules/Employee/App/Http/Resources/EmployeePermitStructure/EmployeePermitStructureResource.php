<?php

namespace Modules\Employee\App\Http\Resources\EmployeePermitStructure;

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

            'position' => new \Modules\HRMaster\App\Http\Resources\Position\PositionResource($this->position),
            'working_area' => new \Modules\HRMaster\App\Http\Resources\WorkingArea\WorkingAreaResource($this->workingArea),
            'approval1' => new \Modules\HRMaster\App\Http\Resources\Position\PositionResource($this->approval1),
            'approval2' => new \Modules\HRMaster\App\Http\Resources\Position\PositionResource($this->approval2),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
