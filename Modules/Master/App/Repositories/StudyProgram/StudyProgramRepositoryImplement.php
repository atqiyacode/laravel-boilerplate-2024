<?php

namespace Modules\Master\App\Repositories\StudyProgram;

use LaravelEasyRepository\Implementations\Eloquent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;
use Modules\Master\App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StudyProgramRepositoryImplement extends Eloquent implements StudyProgramRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property \Illuminate\Database\Eloquent\Model|mixed $model;
     */
    protected $model;

    public function __construct(StudyProgram $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->canDelete()->with([
            'gender',
            'religion',
            'workingArea',
            'position'
        ])->useFilters()->get();
    }

    public function getPaginate()
    {
        return $this->model->canDelete()->with([
            'gender',
            'religion',
            'workingArea',
            'position'
        ])->useFilters()->dynamicPaginate();
    }

    public function findById($id)
    {
        return $this->model->canDelete()->with([
            'gender',
            'religion',
            'workingArea',
            'position'
        ])->useFilters()->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $query = $this->model->canDelete()->findOrFail($id);
        $query->update($data);
        return $query;
    }

    public function delete($id)
    {
        $query = $this->model->findOrFail($id)->delete();
        return $query;
    }

    public function restore($id)
    {
        $query = $this->model->onlyTrashed()->findOrFail($id)->restore();
        return $query;
    }

    public function forceDelete($id)
    {
        $query = $this->model->withTrashed()->findOrFail($id)->forceDelete();
        return $query;
    }

    public function destroyMultiple($ids)
    {
        $query = $this->model->whereIn('id', $ids)->delete();
        return $query;
    }

    public function restoreMultiple($ids)
    {
        $query = $this->model->onlyTrashed()->whereIn('id', $ids)->restore();
        return $query;
    }

    public function forceDeleteMultiple($ids)
    {
        $query = $this->model->whereIn('id', $ids)->forceDelete();
        return $query;
    }

    public function export($format)
    {
        if ($format === 'json') {
            $jsonData = $this->model->canDelete()->useFilters()->get();
            return response()->jsonDownload($jsonData, 'data.json');
        } elseif (in_array($format, ['csv', 'xlsx', 'xls'])) {
            $queryData = $this->model->canDelete()->useFilters()->get();
            return $this->downloadExcel($format, $queryData);
        } else {
            return response()->json(['errors' => __('validation.regex', ['attribute' => 'File'])], 400);
        }
    }

    private function downloadExcel($format, $queryData)
    {
        $modelName = class_basename($this->model);
        $exportClassName = "App\\Exports\\{$modelName}Export";
        $export = App::make($exportClassName, ['data' => $queryData]);

        switch (strtolower($format)) {
            case 'csv':
                return Excel::download($export, 'Data.csv', \Maatwebsite\Excel\Excel::CSV);
            case 'xlsx':
                return Excel::download($export, 'Data.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            case 'xls':
                return Excel::download($export, 'Data.xls', \Maatwebsite\Excel\Excel::XLS);
            default:
                // Handle unsupported format or throw an exception
        }
    }
    public function getFromPDDIKTI()
    {
        // using cache
        $universityID = request()->university;

        // Check if data is in cache
        $data = Cache::get('university_' . $universityID);

        if ($data) {
            return $data;
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', config('app.api_dikti_study_program') . '/' . $universityID, []);
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

        // Store data in cache for future use
        Cache::put('university_' . $universityID, $data, 60); // Cache for 60 minutes

        return $data;
    }
}
