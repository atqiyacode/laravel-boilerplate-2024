<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait CanDeleteScope
{
    public function scopeCanDelete(Builder $query)
    {
        $query->when(auth()->check() && auth()->user()->hasAnyRole(['superadmin', 'developer']), function ($q) {
            return $q->withTrashed();
        });
    }
}
