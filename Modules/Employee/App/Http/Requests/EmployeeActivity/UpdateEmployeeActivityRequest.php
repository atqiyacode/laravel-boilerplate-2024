<?php

namespace App\Http\Requests\EmployeeActivity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeActivityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date_of_activity' => ['required', 'date'],
            'detail' => ['required'],
            'attachment' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'exists:employees,id'],
            'type_of_activity_id' => ['required'],
            'note' => ['required'],
        ];
    }
}
