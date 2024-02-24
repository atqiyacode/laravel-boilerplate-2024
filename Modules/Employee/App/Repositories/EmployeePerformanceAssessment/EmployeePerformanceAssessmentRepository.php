<?php

namespace Modules\Employee\App\Repositories\EmployeePerformanceAssessment;

use LaravelEasyRepository\Repository;

interface EmployeePerformanceAssessmentRepository extends Repository
{

    public function getAll();
    public function getPaginate();
    public function findById($id);
    public function restore($id);
    public function forceDelete($id);
    public function destroyMultiple($ids);
    public function restoreMultiple($ids);
    public function forceDeleteMultiple($ids);
    public function export($format);
}
