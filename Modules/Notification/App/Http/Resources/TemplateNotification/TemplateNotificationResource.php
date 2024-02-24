<?php

namespace Modules\Notification\App\Http\Resources\TemplateNotification;

use Modules\Notification\App\Http\Resources\NotificationType\NotificationTypeResource;
use Modules\Notification\App\Http\Resources\User\SimpleUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TemplateNotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'message' => $this->message,
            'image' => $this->image,
            'attachment' => $this->attachment,

            'notification_type_id' => $this->notification_type_id,
            'user_id' => $this->user_id,

            'notificationType' => new NotificationTypeResource($this->notificationType),
            'user' => new SimpleUserResource($this->user),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
