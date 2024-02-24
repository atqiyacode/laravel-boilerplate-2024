<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nik' => ['required', 'string', 'max:255', 'unique:employees,nik'],
            'full_name' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:' . now()->subYears(17)->format('Y-m-d')],
            'gender_id' => ['required', 'exists:genders,id'],
            'religion_id' => ['required', 'exists:religions,id'],
            'field_of_work_id' => ['required', 'exists:field_of_works,id'],
            'working_area_id' => ['required', 'exists:working_areas,id'],
            'employee_type_id' => ['required', 'exists:employee_types,id'],
            'position_id' => ['required', 'exists:positions,id'],
            'unit_id' => ['required', 'exists:units,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal_lahir.before' => trans('alert.minimum-age'),
        ];
    }

    public function attributes(): array
    {
        return [
            'nik' => trans('nik/code'),
            'full_name' => trans('full_name'),
            'tempat_lahir' => trans('place_of_birth'),
            'tanggal_lahir' => trans('date_of_birth'),
            'gender_id' => trans('gender'),
            'religion_id' => trans('religion'),
            'field_of_work_id' => trans('field_of_work'),
            'working_area_id' => trans('working_area'),
            'employee_type_id' => trans('employee_type'),
            'position_id' => trans('position'),
            'unit_id' => trans('unit'),
        ];
    }
}
