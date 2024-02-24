<?php

namespace App\Http\Requests\FailedJob;

use Illuminate\Foundation\Http\FormRequest;

class CreateFailedJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'uuid' => ['required'],
            'connection' => ['required'],
            'queue' => ['required'],
            'payload' => ['required'],
            'exception' => ['required'],
        ];
    }
}
