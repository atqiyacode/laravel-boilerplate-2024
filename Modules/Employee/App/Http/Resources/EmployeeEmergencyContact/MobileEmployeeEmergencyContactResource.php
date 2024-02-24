<?php

namespace Modules\Employee\App\Http\Resources\EmployeeEmergencyContact;

use Modules\Employee\App\Http\Resources\Employee\SimpleEmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MobileEmployeeEmergencyContactResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'employee_id' => $this->employee_id,
        ];
    }
}
