<?php

namespace App\Http\Requests\EmployeeMediaSocial;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeMediaSocialRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'nama_media' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
        ];
    }
}
