<?php

namespace Modules\JobVacancy\App\Repositories\JobVacancy;

use Modules\JobVacancy\App\Models\JobApplication;
use LaravelEasyRepository\Implementations\Eloquent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;
use Modules\JobVacancy\App\Models\JobVacancy;
use Illuminate\Support\Facades\DB;

class JobVacancyRepositoryImplement extends Eloquent implements JobVacancyRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property \Illuminate\Database\Eloquent\Model|mixed $model;
     */
    protected $model;

    public function __construct(JobVacancy $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model
            ->whereHas('position', function ($query) {
                $query->whereNull('deleted_at');
            })
            // ->whereHas('project', function ($query) {
            //     $query->whereNull('deleted_at');
            // })
            ->canDelete()->with([
                'jobApplications',
                'project',
                'position',
            ])->useFilters()->get();
    }

    public function getPaginate()
    {
        return $this->model
            ->whereHas('position', function ($query) {
                $query->whereNull('deleted_at');
            })
            // ->whereHas('project', function ($query) {
            //     $query->whereNull('deleted_at');
            // })
            ->canDelete()->with([
                'jobApplications',
                'project',
                'position',
            ])->useFilters()->dynamicPaginate();
    }

    public function getPaginateCareer()
    {
        return $this->model
            ->whereHas('position', function ($query) {
                $query->whereNull('deleted_at');
            })
            // ->whereHas('project', function ($query) {
            //     $query->whereNull('deleted_at');
            // })
            ->canDelete()->with([
                'jobApplications',
                'project',
                'position',
            ])
            ->when(auth()->check(), function ($query) {
                $query->addSelect([
                    'is_applied' => JobApplication::select(DB::raw("IF(COUNT(*) > 0, true, false)"))
                        ->whereColumn('job_applications.job_vacancy_id', 'job_vacancies.id')
                        ->where('user_id', auth()->user()->id)
                        ->limit(1),
                ]);
            })
            ->when(auth()->check() && auth()->user()->hasRole(['applicant']) && !auth()->user()->hasRole(['employee']), function ($query) {
                $query->where('type', 'open');
            })
            ->useFilters()
            ->dynamicPaginate();
    }

    public function findById($id)
    {
        return $this->model
            ->whereHas('position', function ($query) {
                $query->whereNull('deleted_at');
            })
            // ->whereHas('project', function ($query) {
            //     $query->whereNull('deleted_at');
            // })
            ->canDelete()->with([
                'jobApplications',
                'project',
                'position',
            ])->useFilters()->findOrFail($id);
    }

    public function findBySlug($slug)
    {
        return $this->model
            ->whereSlug($slug)
            ->whereHas('position', function ($query) {
                $query->whereNull('deleted_at');
            })
            // ->whereHas('project', function ($query) {
            //     $query->whereNull('deleted_at');
            // })
            ->canDelete()->with([
                'jobApplications',
                'project',
                'position',
            ])
            ->when(auth()->check(), function ($query) {
                $query->addSelect([
                    'is_applied' => JobApplication::select(DB::raw("IF(COUNT(*) > 0, true, false)"))
                        ->whereColumn('job_applications.job_vacancy_id', 'job_vacancies.id')
                        ->where('user_id', auth()->user()->id)
                        ->limit(1),
                ]);
            })
            ->when(auth()->check() && auth()->user()->hasRole(['applicant']) && !auth()->user()->hasRole(['employee']), function ($query) {
                $query->where('type', 'open');
            })
            ->useFilters()
            ->firstOrFail();
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
}
