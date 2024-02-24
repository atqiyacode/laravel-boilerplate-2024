<?php

namespace Modules\Employee\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeeEducationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Modules\Master\App\Models\LevelOfEducation;

class EmployeeEducation extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeeEducationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'level_of_education_id',
        'ptn_pts',
        'nama_institusi',
        'fakultas',
        'jurusan',
        'npm',
        'ipk',
        'no_ijazah',
        'tahun_masuk',
        'tahun_lulus',
        'status_berkas',
        'status_kelulusan',
        'foto_ijazah',
        'foto_transkrip_nilai',
        'link_dikti',
        'foto_screenshot_dikti',
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

    public function levelOfEducation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LevelOfEducation::class);
    }
}
