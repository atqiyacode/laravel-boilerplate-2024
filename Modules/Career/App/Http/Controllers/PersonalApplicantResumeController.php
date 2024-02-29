<?php

namespace Modules\Career\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Applicant\App\Http\Requests\ApplicantResume\CreateApplicantResumeRequest;
use Modules\Applicant\App\Http\Requests\ApplicantResume\UpdateApplicantResumeRequest;
use Modules\Applicant\App\Services\ApplicantResume\ApplicantResumeService;
use Illuminate\Http\Request;

class PersonalApplicantResumeController extends Controller
{
    protected $service;

    public function __construct(ApplicantResumeService $service)
    {
        $this->service = $service;
    }

    public function checkResume()
    {
        $response = $this->service->findByUserId(auth()->user()->id);
        return $response->getResult();
    }

    public function myResume()
    {
        $response = $this->service->findByUserId(auth()->user()->id);
        return $response->getResult();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $response = $this->service->findByUserId(auth()->user()->id);
        return $response->getResult();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateApplicantResumeRequest $request)
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
    public function update(UpdateApplicantResumeRequest $request, $id)
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
