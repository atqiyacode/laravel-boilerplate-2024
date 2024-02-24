<?php

namespace Modules\Project\App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'start_date' => ['required', 'date',],
            'end_date' => ['required', 'after_or_equal:start_date'],
            // 'start_date' => ['nullable', 'date', 'after_or_equal:now'],
            // 'end_date' => ['nullable', 'after_or_equal:start_date'],
            'max_apply' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
        ];
    }
}
