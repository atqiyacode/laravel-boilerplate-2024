<?php

namespace Modules\Applicant\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Applicant\App\Filters\ApplicantExperienceFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Applicant\App\Scopes\CanDeleteScope;
use Modules\Applicant\App\Scopes\DeveloperScope;

class ApplicantExperience extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = ApplicantExperienceFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_resume_id',
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

    public function applicantResume(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Applicant\App\Models\ApplicantResume::class)->select([
            'id', 'nik', 'nama_lengkap'
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
        return "$months Bulan $days hari";

        $months = $diff->format('%m');
        $days = $diff->format('%d');

        // if ($months == 0) {
        //     return "$days days";
        // } elseif ($months == 1 && $days == 0) {
        //     return "1 month";
        // } elseif ($months == 1) {
        //     return "1 month $days days";
        // } else {
        //     return "$months months $days days";
        // }
    }
}
