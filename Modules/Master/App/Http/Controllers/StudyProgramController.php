<?php

namespace Modules\Master\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Master\App\Http\Requests\StudyProgram\CreateStudyProgramRequest;
use Modules\Master\App\Http\Requests\StudyProgram\UpdateStudyProgramRequest;
use Modules\Master\App\Services\StudyProgram\StudyProgramService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StudyProgramController extends Controller
{
    protected $service;

    public function __construct(StudyProgramService $service)
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
    public function store(CreateStudyProgramRequest $request)
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
    public function update(UpdateStudyProgramRequest $request, $id)
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

    public function getFromPDDIKTI(Request $request)
    {
        // -------------------------------------------------------
        // using cache
        $universityID = $request->university;

        // Check if data is in cache
        $data = Cache::get('university_' . $universityID);

        if ($data) {
            return $data;
        }

        $client = new Client([
            'verify' => false
        ]);
        $response = $client->request('GET', 'https://api-frontend.kemdikbud.go.id/v2/detail_pt_prodi/' . $universityID, []);
        // dd($response);
        // return $response;
        $body = $response->getBody();
        $data = json_decode($body, true);

        if ($response->getStatusCode() !== 200) {
            // Handle the case where the request was not successful (e.g., return an error response)
            return response('Request failed', $response->getStatusCode());
        }

        if (empty($data)) {
            $data = 'Data not found';
            // Cache::put('university_'.$universityID, $data, 60); // Cache for 60 minutes

            // return response('Data not found', 404);
        } else {
            // Process the data as needed
            foreach ($data as &$item) {
                unset($item['rasio_list']);
            }
        }

        // foreach ($data as &$item) {
        //     unset($item['rasio_list']);
        // }

        // Store data in cache for future use
        Cache::put('university_' . $universityID, $data, 60); // Cache for 60 minutes

        return $data;
    }
}
