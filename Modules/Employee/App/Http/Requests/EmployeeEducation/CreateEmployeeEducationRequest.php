<?php

namespace Modules\Employee\App\Http\Requests\EmployeeEducation;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeEducationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'level_of_education_id' => ['required', 'exists:level_of_education,id'],
            'ptn_pts' => ['required', 'in:PTN,PTS'],
            'nama_institusi' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
            'jurusan' => ['required', 'string', 'max:255'],
            'npm' => ['required', 'string', 'max:255'],
            'ipk' => ['nullable', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'max:4'],
            'no_ijazah' => ['nullable', 'string', 'max:255'],
            'tahun_masuk' => ['nullable', 'date_format:Y', 'before:now'],
            'tahun_lulus' => ['nullable', 'date_format:Y', 'after:tahun_masuk'],
            'status_berkas' => ['nullable', 'in:OK,CEK,BELUM OK'],
            'status_kelulusan' => ['nullable', 'in:LULUS,BELUM LULUS,DROP OUT,CUTI'],
            'foto_ijazah' => ['nullable', 'string', 'max:255'],
            'foto_transkrip_nilai' => ['nullable', 'string', 'max:255'],
            'link_dikti' => ['nullable', 'string', 'max:255'],
            'foto_screenshot_dikti' => ['nullable', 'string', 'max:255'],
        ];
    }
}
