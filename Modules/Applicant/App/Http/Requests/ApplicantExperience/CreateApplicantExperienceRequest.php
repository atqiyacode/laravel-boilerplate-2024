<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantExperience;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateApplicantExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'level_of_education_id' => [
                'required', 'exists:level_of_education,id',
                Rule::unique('applicant_experiences')->where(function ($query) {
                    return $query->where('applicant_resume_id', $this->applicant_resume_id)
                        ->where('level_of_education_id', $this->level_of_education_id);
                })
            ],
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'lokasi_kegiatan' => ['required', 'string', 'max:255'],
            'pengguna_jasa' => ['required', 'string', 'max:255'],
            'uraian_tugas' => ['required', 'string', 'max:1000'],
            'waktu_pelaksanaan_mulai' => ['required', 'date', 'before_or_equal:now'],
            'waktu_pelaksanaan_selesai' => ['required', 'date', 'after:waktu_pelaksanaan_mulai', 'before:now'],
            'posisi_penugasan' => ['required', 'string', 'max:255'],
            'status_kepegawaian' => ['required', 'string', 'max:255'],
            'foto_surat_referensi' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'level_of_education_id.unique' => 'jenjang_pendidikan pada resume pengalaman tersebut sudah ada. sudah ada.'
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
