<?php

namespace App\Http\Requests\EmployeeContact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id', 'unique:employee_contacts,employee_id,' . $this->id],
            'phone' => ['nullable', 'regex:/^(\+62|62|0)[2-9][0-9]*$/', 'max:18', 'unique:employee_contacts,phone,' . $this->id],
            'whatsapp' => ['nullable', 'regex:/^(\+62|62|0)[2-9][0-9]*$/', 'max:18', 'unique:employee_contacts,whatsapp,' . $this->id],
            'email' => ['nullable', 'email', 'string', 'max:255', 'unique:employee_contacts,email,' . $this->id],
        ];
    }

    public function attributes(): array
    {
        return [
            'employee_id' => trans('employee'),
        ];
    }
}
