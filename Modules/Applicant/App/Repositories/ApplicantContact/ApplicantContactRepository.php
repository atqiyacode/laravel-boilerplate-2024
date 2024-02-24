<?php

namespace Modules\Applicant\App\Repositories\ApplicantContact;

use LaravelEasyRepository\Repository;

interface ApplicantContactRepository extends Repository
{
    public function getAll();
    public function getPaginate();
    public function findById($id);
    public function restore($id);
    public function forceDelete($id);
    public function destroyMultiple($ids);
    public function restoreMultiple($ids);
    public function forceDeleteMultiple($ids);
}
