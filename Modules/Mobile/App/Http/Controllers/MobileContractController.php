<?php

namespace Modules\Mobile\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Employee\App\Http\Requests\EmployeeContract\CreateEmployeeContractRequest;
use Modules\Employee\App\Http\Requests\EmployeeContract\UpdateEmployeeContractRequest;
use Modules\Employee\App\Services\EmployeeContract\EmployeeContractService;
use Illuminate\Http\Request;

class MobileContractController extends Controller
{
    protected $service;

    public function __construct(EmployeeContractService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->merge([
            'sorts' => '-id',
            'employee_id' => auth()->user()->employee->id
        ]);
        $response = $request->has('all') ? $this->service->getAll() : $this->service->getPaginate();
        return $response->getResult();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeContractRequest $request)
    {
        $request->merge([
            'employee_id' => auth()->user()->employee->id
        ]);
        $query = $this->service->create($request->all());
        return $query->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        request()->merge([
            'employee_id' => auth()->user()->employee->id
        ]);
        return $this->service->findById($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeContractRequest $request, $id)
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

    public function restore($id)
    {
        $query = $this->service->restore($id);
        return $query->toJson();
    }

    public function forceDelete($id)
    {
        $query = $this->service->forceDelete($id);
        return $query->toJson();
    }

    public function destroyMultiple(Request $request)
    {
        $query = $this->service->destroyMultiple($request->ids);
        return $query->toJson();
    }

    public function restoreMultiple(Request $request)
    {
        $query = $this->service->restoreMultiple($request->ids);
        return $query->toJson();
    }

    public function forceDeleteMultiple(Request $request)
    {
        $query = $this->service->forceDeleteMultiple($request->ids);
        return $query->toJson();
    }

    public function export($format)
    {
        return $this->service->export($format);
    }
}
