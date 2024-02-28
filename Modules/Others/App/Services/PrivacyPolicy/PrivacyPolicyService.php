<?php

namespace Modules\Others\App\Services\PrivacyPolicy;

use LaravelEasyRepository\BaseService;

interface PrivacyPolicyService extends BaseService
{

    public function findFirst();
    public function updateFirst($data);
}
