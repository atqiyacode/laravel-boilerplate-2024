<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantAchievement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateApplicantAchievementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'nama_kegiatan' => [
                'required', 'string', 'max:255',
                Rule::unique('applicant_achievements')->where(function ($query) {
                    return $query->where('applicant_resume_id', $this->applicant_resume_id)
                        ->where('nama_kegiatan', $this->nama_kegiatan);
                })
            ],
            'tahun' => ['nullable', 'date_format:Y', 'before:now'],
            'skala' => ['nullable', 'string', 'max:255'],
            'foto_dokumen' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kegiatan.unique' => 'nama_kegiatan achievement pada resume tersebut sudah ada.'
        ];
    }

    public function attributes(): array
    {
        return [
            'applicant_resume_id' => trans('applicant_resume'),
            'nama_kegiatan' => trans('nama_kegiatan')
        ];
    }
}
