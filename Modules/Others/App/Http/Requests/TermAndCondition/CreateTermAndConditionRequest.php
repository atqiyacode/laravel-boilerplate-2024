<?php

namespace Modules\Others\App\Http\Requests\TermAndCondition;

use Illuminate\Foundation\Http\FormRequest;

class CreateTermAndConditionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required'],
        ];
    }
}
