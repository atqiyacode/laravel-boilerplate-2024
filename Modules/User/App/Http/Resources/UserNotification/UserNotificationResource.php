<?php

namespace Modules\User\App\Http\Resources\UserNotification;

use Modules\User\App\Http\Resources\User\SimpleUserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Notification\App\Http\Resources\TemplateNotification\TemplateNotificationResource;

class UserNotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'status' => (bool) $this->status,
            'archived' => (bool) $this->archived,

            'user_id' => $this->user_id,
            'template_notification_id' => $this->template_notification_id,

            'user' => new SimpleUserResource($this->user),
            'template_notification' => new TemplateNotificationResource($this->templateNotification),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
