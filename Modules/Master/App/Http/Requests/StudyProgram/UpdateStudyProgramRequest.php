<?php

namespace Modules\Master\App\Http\Requests\StudyProgram;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudyProgramRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'id_prodi' => ['required', 'string', 'max:255'],
            'kode_prodi' => ['required', 'string', 'max:255'],
        ];
    }
}
