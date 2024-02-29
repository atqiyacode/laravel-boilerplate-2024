<?php

namespace Modules\Employee\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeeContractFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class EmployeeContract extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeeContractFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'employee_id',
        'nama_paket',
        'kode_sirup',
        'nomor_permohonan_pengadaan',
        'tanggal_permohonan_pengadaan',
        'no_und_dpl',
        'tanggal_und_dpl',
        'no_ba_hpl',
        'tanggal_ba_hpl',
        'no_sppbj',
        'tanggal_sppbj',
        'no_spk',
        'tanggal_spk',
        'no_spmk',
        'tanggal_spmk',
        'no_adendum_spk',
        'tanggal_adendum_spk',
        'kegiatan',
        'sub_kegiatan',
        'penugasan',
        'status',
    ];

    protected $casts = [
        // 'tanggal_permohonan_pengadaan' => 'date:Y-m-d',
        // 'tanggal_und_dpl' => 'date:Y-m-d',
        // 'tanggal_ba_hpl' => 'date:Y-m-d',
        // 'tanggal_sppbj' => 'date:Y-m-d',
        // 'tanggal_spk' => 'date:Y-m-d',
        // 'tanggal_spmk' => 'date:Y-m-d',
        // 'tanggal_adendum_spk' => 'date:Y-m-d',
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
}
