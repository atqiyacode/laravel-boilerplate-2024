<?php

namespace Modules\Employee\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeeRelationReferenceFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class EmployeeRelationReference extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeeRelationReferenceFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'nama',
        'jabatan',
        'no_telf',
        'hubungan',
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

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Employee\Modules\Employee\App\Models\Employee::class)->with([
            'employeeType',
            'gender',
            'religion',
            'fieldOfWork',
            'workingArea',
            'position',
            'unit',
        ]);
    }
}
