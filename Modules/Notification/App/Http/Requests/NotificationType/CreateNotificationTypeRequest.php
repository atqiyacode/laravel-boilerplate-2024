<?php

namespace Modules\Notification\App\Http\Requests\NotificationType;

use Illuminate\Foundation\Http\FormRequest;

class CreateNotificationTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
