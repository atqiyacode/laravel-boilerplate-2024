<?php

namespace Modules\Employee\App\Http\Requests\EmployeeAttendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeAttendanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'check_date' => ['required', 'date'],
            'check_in' => ['required', 'date_format:"H:i:s"'],
            'check_out' => ['required', 'date_format:"H:i:s"'],
            'photo_check_in' => ['nullable', 'string', 'max:255'],
            'photo_check_out' => ['nullable', 'string', 'max:255'],
            'location_check_in' => ['nullable', 'string', 'max:255'],
            'location_check_out' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:255'],
            'employee_id' => [
                'required',
                'exists:employees,id',
                Rule::unique('employee_attendances')->where(function ($query) {
                    $query->where('employee_id', $this->employee_id)
                        ->where('check_date', $this->check_date);
                })->ignore($this->id)
            ],

        ];
    }

    public function messages(): array
    {
        return [
            'check_date.date_format' => 'The check date must be in the Y-m-d format.',
            'check_in.date_format' => 'The check in must be in the invalid time format.',
            'check_out.date_format' => 'The check out must be in the invalid time format.',
            'employee_id.unique' => 'An attendance record for this employee on the specified date already exists.',
        ];
    }
}
