<?php

namespace Modules\Others\App\Http\Requests\TermAndCondition;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTermAndConditionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required'],
        ];
    }
}
