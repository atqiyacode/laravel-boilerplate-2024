<?php

namespace Modules\HRMaster\App\Http\Requests\WorkingArea;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkingAreaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
