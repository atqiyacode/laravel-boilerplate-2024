<?php

namespace App\Http\Requests\EmployeePermitStructure;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateEmployeePermitStructureRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "position_id" => [
                'required',
                Rule::unique('employee_permit_structures')->where(function ($query) {
                    return $query->where('position_id', $this->input('position_id'))
                        ->where('working_area_id', $this->input('working_area_id'));
                }),
            ],
            "working_area_id" => [
                'required',
                Rule::unique('employee_permit_structures')->where(function ($query) {
                    return $query->where('position_id', $this->input('position_id'))
                        ->where('working_area_id', $this->input('working_area_id'));
                }),
            ],
            "approval_1" => [
                "nullable",
                function ($attribute, $value, $fail) {
                    $positionId = $this->input('position_id');
                    $approval2 = $this->input('approval_2');

                    if ($value == $positionId || $value == $approval2) {
                        $fail("The selected approval 1 must be different from the position and approval 2.");
                    }
                }
            ],
            "approval_2" => [
                "nullable",
                function ($attribute, $value, $fail) {
                    $positionId = $this->input('position_id');
                    $approval1 = $this->input('approval_1');

                    if ($value == $positionId || $value == $approval1) {
                        $fail("The selected approval 2 must be different from the position and approval 1.");
                    }
                }
            ],
        ];
    }
}
