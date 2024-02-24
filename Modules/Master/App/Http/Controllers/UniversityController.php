<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\University\CreateUniversityRequest;
use App\Http\Requests\University\UpdateUniversityRequest;
use App\Services\University\UniversityService;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    protected $service;

    public function __construct(UniversityService $service)
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
    public function store(CreateUniversityRequest $request)
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
    public function update(UpdateUniversityRequest $request, $id)
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

    public function getFromPDDIKTI()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api-frontend.kemdikbud.go.id/loadpt', [
            'query' => [
                'search' => 'universitas'
            ]
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);
        //count data
        $count = count($data);
        dd($count);
        // dd($data);
        // foreach ($data as $university) {
        //     $university = University::create([
        //         'name' => $university['nama_pt'],
        //     ]);
        // }
        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
}
