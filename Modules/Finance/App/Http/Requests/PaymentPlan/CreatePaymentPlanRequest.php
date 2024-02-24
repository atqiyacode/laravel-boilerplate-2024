<?php

namespace Modules\Finance\App\Http\Requests\PaymentPlan;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentPlanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'period' => ['required', 'integer'],
			'name_of_kak' => ['required', 'string'],
			'number_of_members' => ['required', 'integer'],
			'time_period' => ['required', 'integer'],
			'work_start_date' => ['required', 'date'],
			'end_work_date' => ['required', 'date'],
			'unit_id' => ['required'],
			'schema' => ['required', 'in:1,2'],
			'petition' => ['nullable', 'date'],
			'disposition' => ['nullable', 'date'],
        ];
    }
}
