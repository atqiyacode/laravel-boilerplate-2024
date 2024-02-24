<?php

namespace Modules\Others\App\Http\Controllers\API\Others;

use Modules\Others\App\Events\PrivacyPolicyEvent;
use Modules\Others\App\Exports\PrivacyPolicyExport;
use App\Http\Controllers\Controller;
use Modules\Others\App\Http\Requests\PrivacyPolicy\CreatePrivacyPolicyRequest;
use Modules\Others\App\Http\Requests\PrivacyPolicy\UpdatePrivacyPolicyRequest;
use Modules\Others\App\Services\PrivacyPolicy\PrivacyPolicyService;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    protected $service;

    public function __construct(PrivacyPolicyService $service)
    {
        $this->service = $service;
    }

    /**
     * Display the specified resource.
     */
    public function index()
    {
        return $this->service->findFirst()->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrivacyPolicyRequest $request)
    {
        $query = $this->service->updateFirst($request->all());
        return $query->toJson();
    }
}
