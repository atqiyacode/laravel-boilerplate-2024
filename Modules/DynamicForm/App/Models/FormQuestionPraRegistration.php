<?php

namespace Modules\DynamicForm\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\DynamicForm\App\Filters\FormQuestionPraRegistrationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormQuestionPraRegistration extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = FormQuestionPraRegistrationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'batch',
        'wilayah_tugas',
        'ingin_malanjutkan_pekerjaan',
        'ingin_posisi_yang_sama',
        'komitmen',
        'ketentuan',
        'kendala',
        'kesan_pesan',
        'kritik_saran',
        'other_fields',
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

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Project\App\Models\Project::class);
    }

    public function formPraRegistrations(): HasMany
    {
        return $this->hasMany(\Modules\DynamicForm\App\Models\FormPraRegistration::class);
    }
}
