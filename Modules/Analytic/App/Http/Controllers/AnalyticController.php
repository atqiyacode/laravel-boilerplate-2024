<?php

namespace Modules\Analytic\App\Http\Controllers;

use App\Http\Controllers\Controller;

class AnalyticController extends Controller
{
    protected $service;

    public function __construct(\Modules\Analytic\App\Services\Analytic\AnalyticService $service)
    {
        $this->service = $service;
    }

    public function dashboard()
    {
        return [
            'religions' => $this->service->getDataReligion()->getResult(),
            'employeeTypes' => $this->service->getDataEmployeeType()->getResult(),
        ];
    }

    public function getDataReligion()
    {
        return $this->service->getDataReligion()->getResult();
    }

    public function getDataEmployeeType()
    {
        return $this->service->getDataEmployeeType()->getResult();
    }

    public function getDataGender()
    {
        return $this->service->getDataGender()->getResult();
    }

    public function getDataFieldOfWork()
    {
        return $this->service->getDataFieldOfWork()->getResult();
    }
    public function getDataPosition()
    {
        return $this->service->getDataPosition()->getResult();
    }
    public function getDataWorkingArea()
    {
        return $this->service->getDataWorkingArea()->getResult();
    }
}
