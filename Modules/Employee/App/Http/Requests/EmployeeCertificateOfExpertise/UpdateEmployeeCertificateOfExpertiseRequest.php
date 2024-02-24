<?php

namespace App\Http\Requests\EmployeeCertificateOfExpertise;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeCertificateOfExpertiseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'date_format:Y', 'before_or_equal:now'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'foto_sertifikat' => ['nullable', 'string', 'max:255'],
        ];
    }
}
