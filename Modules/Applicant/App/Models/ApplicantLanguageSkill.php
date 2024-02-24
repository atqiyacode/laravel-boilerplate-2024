<?php

namespace Modules\Applicant\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Applicant\App\Filters\ApplicantLanguageSkillFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Applicant\App\Scopes\CanDeleteScope;
use Modules\Applicant\App\Scopes\DeveloperScope;

class ApplicantLanguageSkill extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = ApplicantLanguageSkillFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_resume_id',
        'bahasa',
        'kemampuan_lisan',
        'kemampuan_tulisan',
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
            'nama_lengkap',
        ]);
    }
}
