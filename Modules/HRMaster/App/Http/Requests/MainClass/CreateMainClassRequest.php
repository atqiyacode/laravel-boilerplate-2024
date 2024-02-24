<?php

namespace Modules\HRMaster\App\Http\Requests\MainClass;

use Illuminate\Foundation\Http\FormRequest;

class CreateMainClassRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:main_classes,name'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
