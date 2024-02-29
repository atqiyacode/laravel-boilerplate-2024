<?php

namespace Modules\Employee\App\Http\Resources\Employee;

use Modules\Employee\App\Http\Resources\EmployeeContact\EmployeeContactResource;
use Modules\Employee\App\Http\Resources\EmployeeContract\EmployeeContractResource;
use Modules\Employee\App\Http\Resources\EmployeeDetail\EmployeeDetailResource;
use Modules\Employee\App\Http\Resources\EmployeeEmergencyContact\EmployeeEmergencyContactResource;
use Modules\Employee\App\Http\Resources\EmployeeType\EmployeeTypeResource;
use Modules\Employee\App\Http\Resources\Gender\GenderResource;
use Modules\HRMaster\App\Http\Resources\Position\PositionResource;
use Modules\Employee\App\Http\Resources\Religion\ReligionResource;
use Modules\Employee\App\Http\Resources\Unit\UnitResource;
use Modules\Employee\App\Http\Resources\WorkingArea\WorkingAreaResource;
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
