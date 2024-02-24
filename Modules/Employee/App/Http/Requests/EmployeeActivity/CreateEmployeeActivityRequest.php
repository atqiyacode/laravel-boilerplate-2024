<?php

namespace Modules\Employee\App\Http\Requests\EmployeeActivity;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeActivityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date_of_activity' => ['required', 'date'],
            'detail' => ['required'],
            'attachment' => ['nullable', 'string', 'max:255'],
            'employee_id' => ['required', 'exists:employees,id'],
            'type_of_activity_id' => ['required'],
            'note' => ['nullable'],
        ];
    }
}
