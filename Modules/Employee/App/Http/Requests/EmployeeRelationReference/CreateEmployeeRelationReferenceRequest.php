<?php

namespace App\Http\Requests\EmployeeRelationReference;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRelationReferenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'no_telf' => ['required', 'string', 'max:255'],
            'hubungan' => ['required', 'string', 'max:255'],
        ];
    }
}
