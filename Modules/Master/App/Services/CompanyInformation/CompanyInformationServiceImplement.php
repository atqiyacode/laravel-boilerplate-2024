<?php

namespace Modules\Master\App\Services\CompanyInformation;

use Modules\Master\App\Http\Resources\CompanyInformation\CompanyInformationResource;
use LaravelEasyRepository\ServiceApi;
use Illuminate\Support\Facades\DB;
use Modules\Master\App\Repositories\CompanyInformation\CompanyInformationRepository;

class CompanyInformationServiceImplement extends ServiceApi implements CompanyInformationService
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

    public function __construct(CompanyInformationRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function findFirst()
    {
        $response = $this->mainRepository->findFirst();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult(new CompanyInformationResource($response));
    }

    public function updateFirst($data)
    {
        $response = DB::transaction(function () use ($data) {
            return $this->mainRepository->updateFirst($data);
        });
        $count = $response ? 1 : 0;
        $message = trans_choice('alert.success-update', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setCode(200)
            ->setResult(new CompanyInformationResource($response));
    }
}
