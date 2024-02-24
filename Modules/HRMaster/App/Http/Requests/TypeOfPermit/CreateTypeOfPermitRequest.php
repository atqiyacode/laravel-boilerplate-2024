<?php

namespace Modules\HRMaster\App\Http\Requests\TypeOfPermit;

use Illuminate\Foundation\Http\FormRequest;

class CreateTypeOfPermitRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:type_of_permits,name'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
