<?php

namespace Modules\KeyPerformanceIndicator\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\KeyPerformanceIndicator\Filters\TypeOfActivityFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\KeyPerformanceIndicator\Scopes\CanDeleteScope;
use Modules\KeyPerformanceIndicator\Scopes\DeveloperScope;

class TypeOfActivity extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = TypeOfActivityFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'note',
        'field_of_work_id',
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

    public function fieldOfWork(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\FieldOfWork::class);
    }
}
