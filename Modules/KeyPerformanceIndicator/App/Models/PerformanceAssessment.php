<?php

namespace Modules\KeyPerformanceIndicator\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\KeyPerformanceIndicator\Filters\PerformanceAssessmentFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\KeyPerformanceIndicator\Scopes\CanDeleteScope;
use Modules\KeyPerformanceIndicator\Scopes\DeveloperScope;

class PerformanceAssessment extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = PerformanceAssessmentFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'poin',
        'note',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
