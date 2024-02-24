<?php

namespace Modules\Others\App\Http\Controllers;

use Modules\Others\App\Events\TermAndConditionEvent;
use Modules\Others\App\Exports\TermAndConditionExport;
use App\Http\Controllers\Controller;
use Modules\Others\App\Http\Requests\TermAndCondition\CreateTermAndConditionRequest;
use Modules\Others\App\Http\Requests\TermAndCondition\UpdateTermAndConditionRequest;
use Modules\Others\App\Services\TermAndCondition\TermAndConditionService;
use Illuminate\Http\Request;

class TermAndConditionController extends Controller
{
    protected $service;

    public function __construct(TermAndConditionService $service)
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
    public function update(UpdateTermAndConditionRequest $request)
    {
        $query = $this->service->updateFirst($request->all());
        return $query->toJson();
    }
}
