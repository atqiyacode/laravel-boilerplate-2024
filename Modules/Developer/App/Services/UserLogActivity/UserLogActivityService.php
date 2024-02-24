<?php

namespace Modules\Developer\App\Services\UserLogActivity;

use LaravelEasyRepository\BaseService;

interface UserLogActivityService extends BaseService
{

    public function getAll();
    public function getPaginate();
    public function getPaginateMobile();
    public function findById($id);
    public function restore($id);
    public function forceDelete($id);
    public function destroyMultiple($ids);
    public function restoreMultiple($ids);
    public function forceDeleteMultiple($ids);
    public function export($format);

    public function destroyMultipleLoginHistory();
}
