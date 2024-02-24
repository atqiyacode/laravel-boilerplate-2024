<?php

namespace App\Http\Resources\EmployeeDetail;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeDetailResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'id_card' => $this->id_card,
            'npwp' => $this->npwp,
            'account_number' => $this->account_number,
            'online_attendance' => (bool) $this->online_attendance,

            'tipe_penyedia_jasa' => $this->tipe_penyedia_jasa,
            'kontrak_ke' => $this->kontrak_ke,
            'status_personil' => (bool) $this->status_personil,
            'tanggal_mulai_kerja' => $this->tanggal_mulai_kerja,
            'harga_satuan' => (int) $this->harga_satuan,
            'bulan_kerja' => $this->bulan_kerja,
            'total_nilai_spk' => (int) $this->total_nilai_spk,
            'harga_spk' => (int) $this->harga_spk,
            'terbilang_spk' => (int) $this->terbilang_spk,
            'tanggal_selesai_kerja' => $this->tanggal_selesai_kerja,
            'keterangan_status' => $this->keterangan_status,
            'tanggal_efektif_keterangan_status' => $this->tanggal_efektif_keterangan_status,
            'jumlah_izin' => $this->jumlah_izin,
            'tanggal_pengajuan_surat_resign' => ($this->tanggal_pengajuan_surat_resign),
            'tanggal_efektif_berhenti_kerja' => $this->tanggal_efektif_berhenti_kerja,
            'keterangan' => $this->keterangan,
            'tahap' => $this->tahap,
            'status' => (bool) $this->status,

            'tanggal_mulai_kerja_formatted' => $this->when($this->tanggal_mulai_kerja != null, function () {
                return Carbon::parse($this->tanggal_mulai_kerja)->isoFormat('LL');
            }),
            'tanggal_selesai_kerja_formatted' => $this->when($this->tanggal_selesai_kerja != null, function () {
                return Carbon::parse($this->tanggal_selesai_kerja)->isoFormat('LL');
            }),
            'tanggal_efektif_keterangan_status_formatted' => $this->when($this->tanggal_efektif_keterangan_status != null, function () {
                return Carbon::parse($this->tanggal_efektif_keterangan_status)->isoFormat('LL');
            }),
            'tanggal_pengajuan_surat_resign_formatted' => $this->when($this->tanggal_pengajuan_surat_resign != null, function () {
                return Carbon::parse($this->tanggal_pengajuan_surat_resign)->isoFormat('LL');
            }),
            'tanggal_efektif_berhenti_kerja_formatted' => $this->when($this->tanggal_efektif_berhenti_kerja != null, function () {
                return Carbon::parse($this->tanggal_efektif_berhenti_kerja)->isoFormat('LL');
            }),

            'employee_id' => $this->employee_id,

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
