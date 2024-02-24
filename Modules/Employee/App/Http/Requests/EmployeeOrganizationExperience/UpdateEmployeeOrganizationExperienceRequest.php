<?php

namespace App\Http\Requests\EmployeeOrganizationExperience;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeOrganizationExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'nama_organisasi' => ['required', 'string', 'max:255'],
            'posisi' => ['required', 'string', 'max:255'],
            'jenis_organisasi' => ['required', 'string', 'max:255'],
            'tahun_mulai' => ['required', 'date_format:Y', 'before_or_equal:now'],
            'tahun_selesai' => ['required', 'date_format:Y', 'after_or_equal:tahun_mulai', 'before_or_equal:now'],
        ];
    }
}
