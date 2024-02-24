<?php

namespace Modules\Employee\App\Http\Requests\EmployeeMediaSocial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeMediaSocialRequest extends FormRequest
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
