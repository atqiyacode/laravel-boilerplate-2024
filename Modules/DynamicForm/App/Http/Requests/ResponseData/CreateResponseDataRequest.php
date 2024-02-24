<?php

namespace Modules\DynamicForm\App\Http\Requests\ResponseData;

use Illuminate\Foundation\Http\FormRequest;

class CreateResponseDataRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'response_id' => ['required', 'exists:responses,id'],
            'form_field_id' => ['required', 'exists:form_fields,id'],
            'option_id' => ['required', 'exists:options,id'],
            'value' => ['required', 'string', 'max:255'],
        ];
    }
}
