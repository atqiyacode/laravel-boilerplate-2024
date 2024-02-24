<?php

namespace Modules\HRMaster\App\Http\Requests\MainClass;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMainClassRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:main_classes,name,' . $this->id],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
