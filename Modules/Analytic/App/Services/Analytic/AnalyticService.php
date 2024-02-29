<?php

namespace Modules\Analytic\App\Services\Analytic;

use LaravelEasyRepository\BaseService;

interface AnalyticService extends BaseService
{

    public function getDataReligion();
    public function getDataEmployeeType();
    public function getDataFieldOfWork();
    public function getDataPosition();
    public function getDataWorkingArea();
    public function getDataGender();
}
