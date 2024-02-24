<?php

namespace Modules\JobApplication\App\Http\Requests\JobApplication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateJobApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'job_vacancy_id' => [
                'required',
                'exists:job_vacancies,id',
                Rule::unique('job_applications')->where(function ($query) {
                    $query->where('user_id', $this->user_id);
                }),
            ],
            'user_id' => [
                'required',
                'exists:users,id',
            ],
            'applicant_resume_id' => [
                'required',
                Rule::exists('applicant_resumes', 'id')->where(function ($query) {
                    $query->where('user_id', $this->user_id);
                })
            ],
            'status' => ['nullable', 'boolean'],
            'keterangan' => ['nullable', 'string', 'max:500'],
            'referal' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'job_vacancy_id.unique' => trans('alert.job_vacancy-unique'),

            'applicant_resume_id.exists' => trans('alert.error-resume-user'),
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => trans('user'),
            'job_vacancy_id' => trans('job vacancy'),
            'applicant_resume_id' => trans('resume'),
        ];
    }
}
