<?php

namespace Modules\JobVacancy\App\Http\Controllers\API\HR;

use App\Http\Controllers\Controller;
use Modules\JobVacancy\App\Http\Requests\JobVacancy\CreateJobVacancyRequest;
use Modules\JobVacancy\App\Http\Requests\JobVacancy\UpdateJobVacancyRequest;
use Modules\JobVacancy\App\Http\Resources\JobVacancy\PublicJobVacancyResource;
use Modules\JobVacancy\App\Models\JobApplication;
use Modules\JobVacancy\App\Models\JobVacancy;
use Modules\JobVacancy\App\Services\JobVacancy\JobVacancyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobVacancyController extends Controller
{
    protected $service;

    public function __construct(JobVacancyService $service)
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
    public function store(CreateJobVacancyRequest $request)
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
    public function update(UpdateJobVacancyRequest $request, $id)
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

    public function listClosedJob(Request $request)
    {

        $employee = auth()->user()->employee ?? null;
        $hasContract = $employee->employeeContracts ?? null;
        if ($hasContract == null  || $employee == null) {
            return $this->respondNotFound(
                'You do not have any access to this closed job yet!'
            );
        }

        $response = $this->service->getPaginateCareer();
        return $response->getResult();
    }
}
