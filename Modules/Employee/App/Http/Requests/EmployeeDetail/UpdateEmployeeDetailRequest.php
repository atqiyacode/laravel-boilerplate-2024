<?php

namespace App\Http\Requests\EmployeeDetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeDetailRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'id_card' => ['required', 'unique:employee_details,id_card,' . $this->id],
            'employee_id' => ['required', 'exists:employees,id', 'unique:employee_details,employee_id,' . $this->id],
            'npwp' => ['required', 'unique:employee_details,npwp,' . $this->id],
            'account_number' => ['required', 'unique:employee_details,account_number,' . $this->id],
            'online_attendance' => ['required', 'boolean'],

            'tipe_penyedia_jasa' => ['required', 'in:JK,JL'],
            'kontrak_ke' => ['required', 'numeric'],
            'status_personil' => ['nullable', 'boolean'],

            'tanggal_mulai_kerja' => ['nullable', 'date'],
            'harga_satuan' => ['nullable', 'numeric'],
            'bulan_kerja' => ['nullable', 'numeric'],
            'total_nilai_spk' => ['nullable', 'numeric'],
            'harga_spk' => ['nullable', 'numeric'],
            'terbilang_spk' => ['nullable', 'numeric'],
            'tanggal_selesai_kerja' => ['nullable', 'date', 'after_or_equal:tanggal_mulai_kerja'],
            'keterangan_status' => ['nullable', 'max:1000'],

            'tanggal_efektif_keterangan_status' => ['nullable', 'date'],
            'jumlah_izin' => ['nullable', 'numeric', 'min:0'],
            'tanggal_pengajuan_surat_resign' => ['nullable', 'date', 'after:tanggal_mulai_kerja', 'before:tanggal_selesai_kerja'],
            'tanggal_efektif_berhenti_kerja' => ['nullable', 'date', 'after:tanggal_pengajuan_surat_resign', 'before:tanggal_selesai_kerja'],
            'keterangan' => ['nullable', 'max:1000'],
            'tahap' => ['nullable'],
            'status' => ['nullable', 'boolean'],

        ];
    }

    public function messages(): array
    {
        return [
            // 'id_card.required' => trans(''),
        ];
    }

    public function attributes(): array
    {
        return [
            'id_card' => trans('id_card'),
            'employee_id' => trans('employee'),
        ];
    }
}
