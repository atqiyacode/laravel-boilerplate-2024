<?php

namespace Modules\Master\App\Http\Requests\Religion;

use Illuminate\Foundation\Http\FormRequest;

class CreateReligionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
