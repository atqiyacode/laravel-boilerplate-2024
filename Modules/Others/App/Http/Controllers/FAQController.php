<?php

namespace Modules\Others\App\Http\Controllers\API\Others;

use Modules\Others\App\Events\FAQEvent;
use Modules\Others\App\Exports\FAQExport;
use App\Http\Controllers\Controller;
use Modules\Others\App\Http\Requests\FAQ\CreateFAQRequest;
use Modules\Others\App\Http\Requests\FAQ\UpdateFAQRequest;
use Modules\Others\App\Services\FAQ\FAQService;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    protected $service;

    public function __construct(FAQService $service)
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
    public function store(CreateFAQRequest $request)
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
    public function update(UpdateFAQRequest $request, $id)
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
