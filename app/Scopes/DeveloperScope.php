<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait DeveloperScope
{
    public function scopeSuperMan(Builder $query)
    {
        $query->when(auth()->check() && auth()->user()->hasAnyRole('developer'), function ($q) {
            return $q->withTrashed();
        });
    }
}
