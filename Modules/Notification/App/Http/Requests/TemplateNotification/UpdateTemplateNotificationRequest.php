<?php

namespace Modules\Notification\App\Http\Requests\TemplateNotification;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemplateNotificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'max:1000'],
            'notification_type_id' => ['required', 'exists:notification_types,id'],

            'image' => ['nullable', 'string', 'max:255'],
            'attachment' => ['nullable', 'string', 'max:255'],
            // 'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
