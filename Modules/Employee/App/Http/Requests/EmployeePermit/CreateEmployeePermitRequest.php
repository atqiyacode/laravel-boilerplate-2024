<?php

namespace App\Http\Requests\EmployeePermit;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeePermitRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type_of_permit_id' => ['required', 'exists:type_of_permits,id'],
            'permit_status_id' => ['required', 'exists:permit_statuses,id'],
            'employee_id' => ['required', 'exists:employees,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'note' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
