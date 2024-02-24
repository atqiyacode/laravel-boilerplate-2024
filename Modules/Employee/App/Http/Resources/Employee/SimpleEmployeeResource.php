<?php

namespace Modules\Employee\App\Http\Resources\Employee;

use Modules\Employee\App\Http\Resources\EmployeeType\EmployeeTypeResource;
use Modules\Employee\App\Http\Resources\FieldOfWork\FieldOfWorkResource;
use Modules\Employee\App\Http\Resources\Gender\GenderResource;
use Modules\Employee\App\Http\Resources\Position\PositionResource;
use Modules\Employee\App\Http\Resources\Religion\ReligionResource;
use Modules\Employee\App\Http\Resources\Unit\UnitResource;
use Modules\Employee\App\Http\Resources\WorkingArea\WorkingAreaResource;
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
