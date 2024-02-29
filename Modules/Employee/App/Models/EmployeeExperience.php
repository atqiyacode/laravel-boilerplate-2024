<?php

namespace Modules\Employee\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeeExperienceFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Modules\Master\App\Models\LevelOfEducation;

class EmployeeExperience extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeeExperienceFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'level_of_education_id',
        'nama_kegiatan',
        'nama_perusahaan',
        'lokasi_kegiatan',
        'pengguna_jasa',
        'uraian_tugas',
        'waktu_pelaksanaan_mulai',
        'waktu_pelaksanaan_selesai',
        'posisi_penugasan',
        'status_kepegawaian',
        'foto_surat_referensi',
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
        'waktu_pelaksanaan_mulai' => 'date:Y-m-d',
        'waktu_pelaksanaan_selesai' => 'date:Y-m-d',
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

    public function levelOfEducation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Master\App\Models\LevelOfEducation::class)->select([
            'id', 'name'
        ]);
    }

    public function getTotalMonthsExperienceAttribute()
    {
        $startDate = $this->waktu_pelaksanaan_mulai;
        $endDate = $this->waktu_pelaksanaan_selesai;

        if (!$startDate || !$endDate) {
            return null; // Handle cases where either date is missing
        }

        $diff = $endDate->diffInDays($startDate);

        $months = floor($diff / 30);
        $days = $diff % 30;
        return trans('lang.total_experiences', [
            'months' => $months,
            'days' => $days
        ]);
    }
}
