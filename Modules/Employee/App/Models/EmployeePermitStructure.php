<?php

namespace Modules\Employee\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeePermitStructureFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeePermitStructure extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeePermitStructureFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'position_id',
        'approval_1',
        'approval_2',
        'working_area_id'
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

    // from dev-api
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function workingArea(): BelongsTo
    {
        return $this->belongsTo(WorkingArea::class, 'working_area_id', 'id');
    }

    public function approval1()
    {
        return $this->belongsTo(Position::class, 'approval_1');
    }

    public function approval2()
    {
        return $this->belongsTo(Position::class, 'approval_2');
    }
}
