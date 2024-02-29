<?php

namespace Modules\Employee\App\Http\Resources\Employee;

use Modules\Master\App\Http\Resources\EmployeeType\EmployeeTypeResource;
use Modules\HRMaster\App\Http\Resources\FieldOfWork\FieldOfWorkResource;
use Modules\Master\App\Http\Resources\Gender\GenderResource;
use Modules\HRMaster\App\Http\Resources\MainClass\MainClassResource;
use Modules\HRMaster\App\Http\Resources\Position\PositionResource;
use Modules\Master\App\Http\Resources\Religion\ReligionResource;
use Modules\HRMaster\App\Http\Resources\Unit\UnitResource;
use Modules\HRMaster\App\Http\Resources\WorkingArea\WorkingAreaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SimpleEmployeeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'full_name' => $this->full_name,
            'gender' => new GenderResource($this->gender),
            'religion' => new ReligionResource($this->religion),
            'employeeType' => new EmployeeTypeResource($this->employeeType),
            'fieldOfWork' => new FieldOfWorkResource($this->fieldOfWork),
            'workingArea' => new WorkingAreaResource($this->workingArea),
            'position' => new PositionResource($this->position),
            'unit' => new UnitResource($this->unit),
        ];
    }
}
