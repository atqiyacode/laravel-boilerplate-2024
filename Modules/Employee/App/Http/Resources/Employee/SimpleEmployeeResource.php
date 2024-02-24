<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\EmployeeType\EmployeeTypeResource;
use App\Http\Resources\FieldOfWork\FieldOfWorkResource;
use App\Http\Resources\Gender\GenderResource;
use App\Http\Resources\Position\PositionResource;
use App\Http\Resources\Religion\ReligionResource;
use App\Http\Resources\Unit\UnitResource;
use App\Http\Resources\WorkingArea\WorkingAreaResource;
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
