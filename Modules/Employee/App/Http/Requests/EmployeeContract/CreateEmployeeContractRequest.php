<?php

namespace App\Http\Requests\EmployeeContract;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateEmployeeContractRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'project_id' => ['nullable', 'exists:projects,id'],

            'employee_id' => [
                'required', 'exists:employees,id',
                Rule::unique('employee_contracts')->where(function ($query) {
                    $query->where('employee_id', $this->employee_id)
                        ->where('project_id', $this->project_id);
                })

            ],
            'nama_paket' => ['required', 'string', 'max:255'],
            'kode_sirup' => ['required', 'string', 'max:255', 'unique:employee_contracts,kode_sirup'],

            'nomor_permohonan_pengadaan' => ['nullable', 'string', 'max:255'],
            'tanggal_permohonan_pengadaan' => ['nullable', 'date', function ($attribute, $value, $fail) {
                if (empty($this->nomor_permohonan_pengadaan)) {
                    $this->merge(['tanggal_permohonan_pengadaan' => null]);
                }
            }],

            'no_und_dpl' => ['nullable', 'string', 'max:255'],
            'tanggal_und_dpl' => ['nullable', 'date'],

            'no_ba_hpl' => ['nullable', 'string', 'max:255'],
            'tanggal_ba_hpl' => ['nullable', 'date'],

            'no_sppbj' => ['nullable', 'string', 'max:255'],
            'tanggal_sppbj' => ['nullable', 'date'],

            'no_spk' => ['nullable', 'string', 'max:255'],
            'tanggal_spk' => ['nullable', 'date'],

            'no_spmk' => ['nullable', 'string', 'max:255'],
            'tanggal_spmk' => ['nullable', 'date'],

            'no_adendum_spk' => ['nullable', 'string', 'max:255'],
            'tanggal_adendum_spk' => ['nullable', 'date'],

            'kegiatan' => ['nullable', 'string', 'max:255'],
            'sub_kegiatan' => ['nullable', 'string', 'max:255'],
            'penugasan' => ['nullable', 'string', 'max:255'],

            'status' => ['nullable', 'boolean'],
        ];
    }
}
