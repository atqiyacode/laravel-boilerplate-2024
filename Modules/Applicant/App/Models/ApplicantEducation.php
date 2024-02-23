<?php

namespace Modules\Applicant\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Applicant\App\Filters\ApplicantEducationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class ApplicantEducation extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = ApplicantEducationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_resume_id',
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

    public function applicantResume(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Applicant\App\Models\ApplicantResume::class)->select([
            'id',
            'nik',
            'nama_lengkap'
        ]);
    }

    public function levelOfEducation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Master\App\Models\LevelOfEducation::class)->select(['id', 'name']);
    }
}
