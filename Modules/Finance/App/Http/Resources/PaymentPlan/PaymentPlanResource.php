<?php

namespace Modules\Finance\App\Http\Resources\PaymentPlan;

use Modules\Finance\App\Http\Resources\Unit\UnitResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentPlanResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'period' => $this->period,
            'name_of_kak' => $this->name_of_kak,
            'number_of_members' => $this->number_of_members,
            'time_period' => $this->time_period,
            'work_start_date' => $this->work_start_date->format('d F Y'),
            'end_work_date' => $this->end_work_date->format('d F Y'),
            'unit_id' => $this->unit_id,
            'schema' => $this->schema,
            'petition' => $this->petition->format('d F Y'),
            'disposition' => $this->disposition->format('d F Y'),
            'unit' => new UnitResource($this->unit),

            // dummy
            'rpp' => Carbon::parse($this->disposition)->addDays(1)->format('d F Y'),
            'bahp' => Carbon::parse($this->disposition)->addDays(2)->format('d F Y'),
            'bast' => Carbon::parse($this->disposition)->addDays(2)->format('d F Y'),
            'bapp' => Carbon::parse($this->disposition)->addDays(3)->format('d F Y'),
            'spm' => Carbon::parse($this->disposition)->addDays(10)->format('d F Y'),
        ];
    }
}
