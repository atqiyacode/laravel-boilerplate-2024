<?php

namespace Modules\User\App\Http\Requests\UserNotification;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserNotificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required', 'boolean'],
			'user_id' => ['required'],
			'template_notification_id' => ['required'],
        ];
    }
}
