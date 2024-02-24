<?php

namespace App\Repositories\PrivacyPolicy;

use LaravelEasyRepository\Implementations\Eloquent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;
use Modules\Others\App\Models\PrivacyPolicy;

class PrivacyPolicyRepositoryImplement extends Eloquent implements PrivacyPolicyRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property \Illuminate\Database\Eloquent\Model|mixed $model;
     */
    protected $model;

    public function __construct(PrivacyPolicy $model)
    {
        $this->model = $model;
    }

    public function findFirst()
    {
        return $this->model->first();
    }

    public function updateFirst($data)
    {
        $query = $this->model->first();
        $query->update($data);
        return $query;
    }
}
