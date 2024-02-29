<?php

namespace Modules\Activity\App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MonthActivityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'month_name' => Carbon::create()->month($this->month)->format('F') . ', ' . $this->year,
            'month' => $this->month,
            'year' => $this->year,
            'activity_count' => $this->activity_count,
        ];
    }
}
