<?php

namespace Modules\DynamicForm\App\Http\Requests\FormField;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormFieldRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'form_id' => ['required', 'exists:forms,id'],
            'type' => ['required', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255'],
        ];
    }
}
