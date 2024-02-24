<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantEducation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicantEducationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => [
                'required', 'exists:applicant_resumes,id',
                Rule::unique('applicant_experiences')->where(function ($query) {
                    return $query->where('applicant_resume_id', $this->applicant_resume_id)
                        ->where('level_of_education_id', $this->level_of_education_id);
                })->ignore($this->id)
            ],
            'level_of_education_id' => ['required', 'exists:level_of_education,id'],
            'ptn_pts' => ['required', 'in:PTN,PTS'],
            'nama_institusi' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
            'jurusan' => ['required', 'string', 'max:255'],
            'npm' => ['required', 'string', 'max:255'],
            'ipk' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'max:4'],
            'no_ijazah' => ['required', 'string', 'max:255'],
            'tahun_masuk' => ['required', 'date_format:Y', 'before:now'],
            'tahun_lulus' => ['required', 'date_format:Y', 'after:tahun_masuk'],
            'status_berkas' => ['required', 'in:OK,CEK,BELUM OK'],
            'foto_ijazah' => ['required', 'string', 'max:255'],
            'foto_transkrip_nilai' => ['required', 'string', 'max:255'],
            'link_dikti' => ['required', 'string', 'max:255'],
            'foto_screenshot_dikti' => ['required', 'string', 'max:255'],
            // 'status_kelulusan' => ['required', 'in:LULUS,BELUM LULUS,DROP OUT,CUTI'],
        ];
    }

    public function messages(): array
    {
        return [
            'level_of_education_id.unique' => 'jenjang_pendidikan pada resume tersebut sudah ada.'
        ];
    }

    public function attributes(): array
    {
        return [
            'applicant_resume_id' => trans('applicant_resume'),
            'level_of_education_id' => trans('level_of_education')
        ];
    }
}
