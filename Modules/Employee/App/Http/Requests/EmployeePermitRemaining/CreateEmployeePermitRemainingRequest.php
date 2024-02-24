<?php

namespace App\Http\Requests\EmployeePermitRemaining;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeePermitRemainingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'has_use' => ['required', 'numeric', 'min:0'],
            'limit' => ['required', 'numeric', 'min:0', 'gt:has_use'],
            // 'total' => ['required', 'numeric', 'min:0'],
            'note' => ['nullable', 'string', 'max:255'],
            'employee_id' => ['required', 'exists:employees,id', 'unique:employee_permit_remainings,employee_id'],
        ];
    }
}
