<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantLanguageSkill;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateApplicantLanguageSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'bahasa' => [
                'required', 'string', 'max:255',
                Rule::unique('applicant_language_skills')->where(function ($query) {
                    return $query->where('applicant_resume_id', $this->applicant_resume_id)
                        ->where('bahasa', $this->bahasa);
                })
            ],
            'kemampuan_lisan' => ['required', 'numeric', 'min:10', 'max:100'],
            'kemampuan_tulisan' => ['required', 'numeric', 'min:10', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'bahasa.unique' => 'Bahasa pada resume tersebut sudah ada.'
        ];
    }

    public function attributes(): array
    {
        return [
            'applicant_resume_id' => trans('applicant_resume'),
            'bahasa' => trans('bahasa')
        ];
    }
}
