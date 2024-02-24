<?php

namespace Modules\Master\App\Http\Requests\EmployeeType;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:employee_types,name'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
