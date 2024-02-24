<?php

namespace Modules\MobileApp\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\MobileApp\App\Http\Requests\MobileServer\UpdateMobileServerRequest;
use Modules\MobileApp\App\Http\Resources\MobileServer\MobileServerResource;
use Modules\MobileApp\App\Models\MobileServer;
use Modules\MobileApp\App\Services\MobileServer\MobileServerService;

class MobileServerController extends Controller
{
    protected $service;

    public function __construct(MobileServerService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = MobileServer::first();
        return $this->respondWithSuccess(new MobileServerResource($response));
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(UpdateMobileServerRequest $request)
    {
        $response = MobileServer::first();
        $response->update($request->all());
        return $this->respondWithSuccess(new MobileServerResource($response));
    }
}
