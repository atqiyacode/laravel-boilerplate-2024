<?php

namespace Modules\Employee\App\Http\Requests\EmployeeAchievement;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeAchievementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'tahun' => ['nullable', 'date_format:Y', 'before:now'],
            'skala' => ['nullable', 'string', 'max:255'],
            'foto_dokumen' => ['nullable', 'string', 'max:255'],
        ];
    }
}
