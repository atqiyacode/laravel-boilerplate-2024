<?php

namespace Modules\DynamicForm\App\Http\Requests\Option;

use Illuminate\Foundation\Http\FormRequest;

class CreateOptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'form_field_id' => ['required', 'exists:form_fields,id'],
            'value' => ['required', 'string', 'max:255'],
        ];
    }
}
