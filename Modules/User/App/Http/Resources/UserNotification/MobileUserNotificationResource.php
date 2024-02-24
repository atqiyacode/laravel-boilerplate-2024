<?php

namespace Modules\User\App\Http\Resources\UserNotification;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use Modules\Notification\App\Http\Resources\TemplateNotification\MobileTemplateNotificationResource;

class MobileUserNotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        $carbonDate = Carbon::parse($this->created_at);
        return [
            'id' => $this->id,
            'status' => (bool) $this->status,
            'archived' => (bool) $this->archived,
            'notification' => new MobileTemplateNotificationResource($this->templateNotification),
            'short_title' => Str::words($this->templateNotification->title, 10),
            'short_message' => Str::words($this->templateNotification->message, 10),
            'date' => $carbonDate->isoFormat('LLLL'),
            'time' => $carbonDate->isToday()
                ? $carbonDate->format('H:i') // If today, show hour and time
                : $carbonDate->format('d/m/y'), // Otherwise, show full date
        ];
    }
}
