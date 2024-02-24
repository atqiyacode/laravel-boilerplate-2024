<?php

namespace App\Http\Requests\EmployeeType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:employee_types,name,' . $this->id],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
