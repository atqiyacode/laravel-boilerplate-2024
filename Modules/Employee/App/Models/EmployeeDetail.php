<?php

namespace Modules\Employee\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeeDetailFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class EmployeeDetail extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeeDetailFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'id_card',
        'employee_id',
        'npwp',
        'account_number',
        'online_attendance',

        'tipe_penyedia_jasa',
        'kontrak_ke',
        'status_personil',
        'tanggal_mulai_kerja',
        'harga_satuan',
        'bulan_kerja',
        'total_nilai_spk',
        'harga_spk',
        'terbilang_spk',
        'tanggal_selesai_kerja',
        'keterangan_status',
        'tanggal_efektif_keterangan_status',
        'jumlah_izin',
        'tanggal_pengajuan_surat_resign',
        'tanggal_efektif_berhenti_kerja',
        'keterangan',
        'tahap',
        'status',
    ];

    protected $casts = [
        // 'tanggal_mulai_kerja' => 'date:Y-m-d',
        // 'tanggal_selesai_kerja' => 'date:Y-m-d',
        // 'tanggal_efektif_keterangan_status' => 'date:Y-m-d',
        // 'tanggal_pengajuan_surat_resign' => 'date:Y-m-d',
        // 'tanggal_efektif_berhenti_kerja' => 'date:Y-m-d',
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
