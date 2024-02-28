<?php

namespace Modules\Others\App\Services\TermAndCondition;

use LaravelEasyRepository\BaseService;

interface TermAndConditionService extends BaseService
{

    public function findFirst();
    public function updateFirst($data);
}
