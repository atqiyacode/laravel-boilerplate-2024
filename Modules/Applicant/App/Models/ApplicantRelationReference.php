<?php

namespace Modules\Applicant\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Applicant\App\Filters\ApplicantRelationReferenceFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class ApplicantRelationReference extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = ApplicantRelationReferenceFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_resume_id',
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

    public function applicantResume(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Applicant\App\Models\ApplicantResume::class)->select([
            'id',
            'nik',
            'nama_lengkap',
        ]);
    }
}
