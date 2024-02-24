<?php

namespace Modules\Notification\App\Http\Resources\TemplateNotification;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MobileTemplateNotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        $carbonDate = Carbon::parse($this->created_at);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'message' => $this->message,
            'image' => $this->image,
            'attachment' => $this->attachment
        ];
    }
}
