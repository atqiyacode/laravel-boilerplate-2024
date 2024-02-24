<?php

namespace Modules\HRMaster\App\Http\Requests\FieldOfWork;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldOfWorkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:field_of_works,name,' . $this->id],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
