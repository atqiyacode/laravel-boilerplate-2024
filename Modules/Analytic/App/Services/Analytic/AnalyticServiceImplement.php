<?php

namespace Modules\Analytic\App\Services\Analytic;

use LaravelEasyRepository\ServiceApi;
use Modules\Analytic\App\Repositories\Analytic\AnalyticRepository;

class AnalyticServiceImplement extends ServiceApi implements AnalyticService
{

    /**
     * set message api for CRUD
     * @param string $title
     * @param string $create_message
     * @param string $update_message
     * @param string $delete_message
     * @param string $restore_message
     * @param string $destroy_message
     * @param string $found_message
     */
    protected $title = "";
    protected $create_message = "";
    protected $update_message = "";
    protected $delete_message = "";
    protected $restore_message = "";
    protected $destroy_message = "";
    protected $found_message = "";

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(AnalyticRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getDataReligion()
    {
        $response = $this->mainRepository->getDataReligion();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }

    public function getDataEmployeeType()
    {
        $response = $this->mainRepository->getDataEmployeeType();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }
    public function getDataFieldOfWork()
    {
        $response = $this->mainRepository->getDataFieldOfWork();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }
    public function getDataPosition()
    {
        $response = $this->mainRepository->getDataPosition();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }
    public function getDataWorkingArea()
    {
        $response = $this->mainRepository->getDataWorkingArea();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }
    public function getDataGender()
    {
        $response = $this->mainRepository->getDataGender();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }
}
