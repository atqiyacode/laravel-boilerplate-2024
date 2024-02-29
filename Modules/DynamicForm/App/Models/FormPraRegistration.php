<?php

namespace Modules\DynamicForm\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\DynamicForm\App\Filters\FormPraRegistrationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class FormPraRegistration extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = FormPraRegistrationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_resume_id',
        'project_id',
        'form_question_pra_registration_id',
        'batch',
        'wilayah_tugas',
        'ingin_malanjutkan_pekerjaan',
        'ingin_posisi_yang_sama',
        'komitmen',
        'ketentuan',
        'kendala',
        'kesan_pesan',
        'kritik_saran',
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

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Project::class)->select([
            'id', 'name'
        ]);
    }

    public function formQuestionPraRegistration(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\FormQuestionPraRegistration::class);
    }
}
