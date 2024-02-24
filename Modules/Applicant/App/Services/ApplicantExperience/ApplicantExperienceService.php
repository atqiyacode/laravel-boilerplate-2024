<?php

namespace Modules\Applicant\App\Services\ApplicantExperience;

use LaravelEasyRepository\BaseService;

interface ApplicantExperienceService extends BaseService
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
