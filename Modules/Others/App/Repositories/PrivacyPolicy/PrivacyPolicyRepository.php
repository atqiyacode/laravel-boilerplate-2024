<?php

namespace Modules\Others\App\Repositories\PrivacyPolicy;

use LaravelEasyRepository\Repository;

interface PrivacyPolicyRepository extends Repository
{

    public function findFirst();
    public function updateFirst($data);
}
