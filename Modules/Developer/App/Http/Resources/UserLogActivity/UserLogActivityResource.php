<?php

namespace Modules\Developer\App\Http\Resources\UserLogActivity;

use Modules\Developer\App\Http\Resources\User\SimpleUserResource;
use Modules\Developer\App\Models\UserLogActivity;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLogActivityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => new SimpleUserResource($this->whenLoaded('user')),
            'log_type' => $this->log_type,
            'table_name' => $this->table_name,
            'data' => $this->json_data,
            'history' => $this->when($this->log_type === 'edit', function () {
                $history =  UserLogActivity::with(['user'])->orderBy('log_date', 'desc')
                    ->whereNotIn('id', [$this->id])
                    ->where(['table_name' => $this->table_name])
                    ->first();
                return new HistoryUserLogActivityResource($history);
            }),
            'log_date_human' => $this->dateHumanize,
            'log_date' => ($this->log_date),
        ];
    }
}
