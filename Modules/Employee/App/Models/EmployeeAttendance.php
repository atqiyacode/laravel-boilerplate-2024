<?php

namespace Modules\Employee\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeeAttendanceFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employee\App\Scopes\CanDeleteScope;
use Modules\Employee\App\Scopes\DeveloperScope;
use Carbon\Carbon;

class EmployeeAttendance extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeeAttendanceFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'check_date',
        'check_in',
        'check_out',
        'photo_check_in',
        'photo_check_out',
        'location_check_in',
        'location_check_out',
        'note',
        'employee_id',
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
        return $this->belongsTo(Employee::class)->with([
            'employeeType',
            'gender',
            'religion',
            'fieldOfWork',
            'workingArea',
            'position',
            'unit',
        ]);
    }

    public function getLateAttribute()
    {
        $startTime = Carbon::parse('09:00:00');
        $endTime = Carbon::parse($this->check_in);

        $timeDifference = $endTime->diff($startTime);

        $hours = $timeDifference->h; // Hours
        $minutes = $timeDifference->i; // Minutes

        return "$hours hours, $minutes minutes";
    }

    public function getFastAttribute()
    {
        $startTime = Carbon::parse('17:00:00');
        $endTime = Carbon::parse($this->check_out);

        $timeDifference = $startTime->diff($endTime);

        $hours = $timeDifference->h; // Hours
        $minutes = $timeDifference->i; // Minutes

        return "$hours hours, $minutes minutes";
    }
}
