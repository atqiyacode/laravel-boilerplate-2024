<?php

namespace Modules\Analytic\App\Repositories\Analytic;

use LaravelEasyRepository\Repository;

interface AnalyticRepository extends Repository
{

    public function getDataReligion();
    public function getDataEmployeeType();
    public function getDataFieldOfWork();
    public function getDataPosition();
    public function getDataWorkingArea();
    public function getDataGender();
}
