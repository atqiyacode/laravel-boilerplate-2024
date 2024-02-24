<?php

namespace Modules\Employee\App\Http\Requests\EmployeeExperience;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateEmployeeExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'level_of_education_id' => [
                'required',
                'exists:level_of_education,id',
                Rule::unique('employee_experiences')->where(function ($query) {
                    return $query->where('employee_id', $this->employee_id)
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
}
