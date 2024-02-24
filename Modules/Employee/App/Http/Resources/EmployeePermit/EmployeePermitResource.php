<?php

namespace App\Http\Resources\EmployeePermit;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use App\Models\PermitStatus;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class EmployeePermitResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type_of_permit_id' => $this->type_of_permit_id,
            'permit_status_id' => $this->permit_status_id,
            'employee_id' => $this->employee_id,
            'start_date' => $this->start_date->format('Y-m-d'),
            'end_date' => $this->end_date->format('Y-m-d'),
            'start_date_formatted' => $this->start_date->isoFormat('LL'),
            'end_date_formatted' => $this->end_date->isoFormat('LL'),
            'note' => $this->note,

            // custom
            'days' => $this->start_date->eq($this->end_date) ? 1 : $this->start_date->diffInDays($this->end_date),
            'flow_status' => $this->generateStatusProcess($this->permit_status_id),

            // relation
            'typeOfPermit' => $this->typeOfPermit,
            'permitStatus' => $this->permitStatus,
            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }

    private function generateStatusProcess($statusId)
    {
        $statusRuleMap = [
            1 => [1],
            2 => [1, 2],
            3 => [1, 3],
            4 => [1, 2, 4],
            5 => [1, 2, 5],
            6 => [1, 6],
        ];
        $statusCacheKey = "statuses:$statusId";

        $cachedData = Cache::remember($statusCacheKey, now()->addHours(1), function () use ($statusRuleMap, $statusId) {
            return PermitStatus::whereIn('id', $statusRuleMap[$statusId] ?? [])->get()->toArray();
        });

        return $cachedData;
    }
}
