<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class CreateUniversityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'id_sp' => ['required', 'string', 'max:255'],
            'kode_pt' => ['required', 'string', 'max:255'],
        ];
    }
}
