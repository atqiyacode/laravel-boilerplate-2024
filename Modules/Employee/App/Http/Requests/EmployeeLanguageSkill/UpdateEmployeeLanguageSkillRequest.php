<?php

namespace Modules\Employee\App\Http\Requests\EmployeeLanguageSkill;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeLanguageSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'bahasa' => [
                'required', 'string', 'max:255',
                Rule::unique('employee_language_skills')->where(function ($query) {
                    return $query->where('employee_id', $this->employee_id)
                        ->where('bahasa', $this->bahasa);
                })->ignore($this->id)
            ],
            'kemampuan_lisan' => ['required', 'numeric', 'min:10', 'max:100'],
            'kemampuan_tulisan' => ['required', 'numeric', 'min:10', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'bahasa.unique' => 'Bahasa sudah ada untuk employee tersebut.'
        ];
    }

    public function attributes(): array
    {
        return [
            'employee_id' => trans('employee'),
            'bahasa' => trans('level_of_education')
        ];
    }
}
