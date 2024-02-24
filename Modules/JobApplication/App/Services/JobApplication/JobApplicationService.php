<?php

namespace Modules\JobApplication\App\Services\JobApplication;

use LaravelEasyRepository\BaseService;

interface JobApplicationService extends BaseService
{

    public function getAll();
    public function getPaginate();
    public function findById($id);
    public function restore($id);
    public function forceDelete($id);
    public function destroyMultiple($ids);
    public function restoreMultiple($ids);
    public function forceDeleteMultiple($ids);

    public function action($request, $id);
}
