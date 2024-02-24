<?php

namespace Modules\Employee\App\Http\Requests\EmployeeAttachment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeAttachmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id', 'unique:employee_attachments,employee_id,' . $this->id],
            'foto_ktp' => ['nullable', 'string', 'max:255'],
            'foto_npwp' => ['nullable', 'string', 'max:255'],
            'foto_pasfoto' => ['nullable', 'string', 'max:255'],
            'foto_selfie' => ['nullable', 'string', 'max:255'],
            'foto_kswp' => ['nullable', 'string', 'max:255'],
            'foto_cv' => ['nullable', 'string', 'max:255'],
        ];
    }
}
