<?php

namespace App\Repositories\TermAndCondition;

use LaravelEasyRepository\Repository;

interface TermAndConditionRepository extends Repository
{

    public function findFirst();
    public function updateFirst($data);
}
