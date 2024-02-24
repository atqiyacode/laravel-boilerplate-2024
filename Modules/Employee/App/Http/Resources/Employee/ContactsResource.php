<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\EmployeeContact\EmployeeContactResource;
use App\Http\Resources\EmployeeContract\EmployeeContractResource;
use App\Http\Resources\EmployeeDetail\EmployeeDetailResource;
use App\Http\Resources\EmployeeEmergencyContact\EmployeeEmergencyContactResource;
use App\Http\Resources\EmployeeType\EmployeeTypeResource;
use App\Http\Resources\Gender\GenderResource;
use App\Http\Resources\Position\PositionResource;
use App\Http\Resources\Religion\ReligionResource;
use App\Http\Resources\Unit\UnitResource;
use App\Http\Resources\WorkingArea\WorkingAreaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'full_name' => $this->full_name,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir->format('Y-m-d'),
            'ttl' => $this->tempat_lahir . ', ' . $this->tanggal_lahir->isoFormat('LL'),

            'age' => $this->age,

            'employeeType' => $this->employeeType,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'fieldOfWork' => $this->fieldOfWork,
            'workingArea' => $this->workingArea,
            'position' => $this->position,
            'unit' => $this->unit,
        ];
    }
}
