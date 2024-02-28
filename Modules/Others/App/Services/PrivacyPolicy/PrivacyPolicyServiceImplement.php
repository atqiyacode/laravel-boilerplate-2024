<?php

namespace Modules\Others\App\Services\PrivacyPolicy;

use Modules\Others\App\Http\Resources\PrivacyPolicy\PrivacyPolicyResource;
use LaravelEasyRepository\ServiceApi;
use Illuminate\Support\Facades\DB;
use Modules\Others\App\Repositories\PrivacyPolicy\PrivacyPolicyRepository;

class PrivacyPolicyServiceImplement extends ServiceApi implements PrivacyPolicyService
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

    public function __construct(PrivacyPolicyRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function findFirst()
    {
        $response = $this->mainRepository->findFirst();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult(new PrivacyPolicyResource($response));
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
            ->setResult(new PrivacyPolicyResource($response));
    }
}
