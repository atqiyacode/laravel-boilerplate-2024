<?php

namespace App\Services\CompanyInformation;

use LaravelEasyRepository\BaseService;

interface CompanyInformationService extends BaseService
{

    public function findFirst();
    public function updateFirst($data);
}
