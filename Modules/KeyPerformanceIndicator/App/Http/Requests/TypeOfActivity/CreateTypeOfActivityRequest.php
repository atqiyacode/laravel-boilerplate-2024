<?php

namespace Modules\KeyPerformanceIndicator\Http\Requests\TypeOfActivity;

use Illuminate\Foundation\Http\FormRequest;

class CreateTypeOfActivityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:255'],
            'field_of_work_id' => ['required'],
        ];
    }
}
