<?php

namespace Modules\Employee\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeePermitFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class EmployeePermit extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeePermitFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'type_of_permit_id',
        'permit_status_id',
        'employee_id',
        'start_date',
        'end_date',
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

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
    ];

    public function typeOfPermit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\HRMaster\App\Models\TypeOfPermit::class)->select(['id', 'name']);
    }

    public function permitStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Master\App\Models\PermitStatus::class)->select(['id', 'name']);
    }

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Employee\App\Models\Employee::class)->with([
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
