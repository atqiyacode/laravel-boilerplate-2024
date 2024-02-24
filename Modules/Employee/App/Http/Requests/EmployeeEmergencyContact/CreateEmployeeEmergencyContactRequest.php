<?php

namespace App\Http\Requests\EmployeeEmergencyContact;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeEmergencyContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(\+62|62|0)[2-9][0-9]*$/', 'max:18'],
            'address' => ['nullable', 'string', 'max:255'],
            'employee_id' => ['required', 'exists:employees,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'employee_id' => trans('employee'),
        ];
    }
}
