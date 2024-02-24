<?php

namespace Modules\KeyPerformanceIndicator\App\Http\Requests\TypeOfActivity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeOfActivityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'note' => ['required', 'string', 'max:255'],
            'field_of_work_id' => ['required'],
        ];
    }
}
