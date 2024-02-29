<?php

namespace Modules\Analytic\App\Repositories\Analytic;

use LaravelEasyRepository\Implementations\Eloquent;

class AnalyticRepositoryImplement extends Eloquent implements AnalyticRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
    //  * Don't remove or change $this->model variable name
     * @property \Illuminate\Database\Eloquent\Model|mixed $model;
     */
    protected $model;

    public function __construct()
    {
        // $this->model = $model;
    }

    public function getDataReligion()
    {
        return \Modules\Master\App\Models\Religion::withCount([
            'employees',
            'applicants',
        ])->canDelete()->useFilters()->get();
    }

    public function getDataEmployeeType()
    {
        return \Modules\Master\App\Models\EmployeeType::withCount([
            'employees',
        ])->canDelete()->useFilters()->get();
    }

    public function getDataFieldOfWork()
    {
        return \Modules\HRMaster\App\Models\FieldOfWork::withCount([
            'employees',
        ])->canDelete()->useFilters()->get();
    }

    public function getDataPosition()
    {
        return \Modules\HRMaster\App\Models\Position::withCount([
            'employees',
        ])->canDelete()->useFilters()->get();
    }

    public function getDataWorkingArea()
    {
        return \Modules\HRMaster\App\Models\WorkingArea::withCount([
            'employees',
        ])->canDelete()->useFilters()->get();
    }

    public function getDataGender()
    {
        return \Modules\Master\App\Models\Gender::withCount([
            'employees',
            'applicants',
        ])->canDelete()->useFilters()->get();
    }
}
