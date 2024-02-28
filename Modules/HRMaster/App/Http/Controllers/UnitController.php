<?php

namespace Modules\HRMaster\App\Http\Controllers;

use Modules\HRMaster\App\Events\UnitEvent;
use Modules\HRMaster\App\Exports\UnitExport;
use App\Http\Controllers\Controller;
use Modules\HRMaster\App\Http\Requests\Unit\CreateUnitRequest;
use Modules\HRMaster\App\Http\Requests\Unit\UpdateUnitRequest;
use Modules\HRMaster\App\Services\Unit\UnitService;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $service;

    public function __construct(UnitService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $response = $request->has('all') ? $this->service->getAll() : $this->service->getPaginate();
        return $response->getResult();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUnitRequest $request)
    {
        $query = $this->service->create($request->all());
        return $query->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->service->findById($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, $id)
    {
        $query = $this->service->update($id, $request->all());
        return $query->toJson();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $query = $this->service->delete($id);
        return $query->toJson();
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $query = $this->service->restore($id);
        return $query->toJson();
    }

    /**
     * Remove Permanent the specified resource from storage.
     */
    public function forceDelete($id)
    {
        $query = $this->service->forceDelete($id);
        return $query->toJson();
    }

    /**
     * Remove Multiple data resource from storage.
     */
    public function destroyMultiple(Request $request)
    {
        $query = $this->service->destroyMultiple($request->ids);
        return $query->toJson();
    }

    /**
     * Restore Multiple data resource from storage.
     */
    public function restoreMultiple(Request $request)
    {
        $query = $this->service->restoreMultiple($request->ids);
        return $query->toJson();
    }

    /**
     * Remove Permanent Multiple data resource from storage.
     */
    public function forceDeleteMultiple(Request $request)
    {
        $query = $this->service->forceDeleteMultiple($request->ids);
        return $query->toJson();
    }

    /**
     * Export data resource from storage.
     */
    public function export($format)
    {
        return $this->service->export($format);
    }
}
