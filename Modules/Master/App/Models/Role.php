<?php

namespace Modules\Master\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Master\Filters\RoleFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = RoleFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

// use App\Http\Controllers\API\HR\JobApplicationController;
// use App\Http\Controllers\API\HR\JobApplicationStatusController;
// use App\Http\Controllers\API\HR\JobVacancyController;
// use App\Http\Controllers\API\HR\ProjectController;
