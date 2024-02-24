<?php

namespace Modules\Employee\App\Services\Employee;

use LaravelEasyRepository\BaseService;

interface EmployeeService extends BaseService
{

    public function getAll();
    public function getPaginate();
    public function findById($id);
    public function findByNik($nik);
    public function restore($id);
    public function forceDelete($id);
    public function destroyMultiple($ids);
    public function restoreMultiple($ids);
    public function forceDeleteMultiple($ids);
    public function export($format);

    public function getContactPaginate();
}
