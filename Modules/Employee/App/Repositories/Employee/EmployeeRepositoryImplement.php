<?php

namespace Modules\Employee\App\Repositories\Employee;

use LaravelEasyRepository\Implementations\Eloquent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;
use Modules\Employee\App\Models\Employee;

class EmployeeRepositoryImplement extends Eloquent implements EmployeeRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property \Illuminate\Database\Eloquent\Model|mixed $model;
     */
    protected $model;

    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->canDelete()->with([
            'employeeType',
            'mainClass',
            'gender',
            'religion',
            'fieldOfWork',
            'workingArea',
            'employeePermitRemaining',
            'position',
            'unit'
        ])->withCount([
            'employeeContracts',
            'employeeEmergencyContacts',
            'employeeContracts',
            'employeeEmergencyContacts',
            'employeeExperiences',
            'employeeAttachments',
            'employeeLanguageSkills',
            'employeeEducation',
            'employeeAchievements',
            'employeeCertificateOfExpertises',
            'employeeMediaSocial',
            'employeeOrganizationExperiences',
            'employeeRelationReferences',
        ])->useFilters()->get();
    }

    public function getPaginate()
    {
        return $this->model->canDelete()->with([
            'employeeType',
            'mainClass',
            'gender',
            'religion',
            'fieldOfWork',
            'workingArea',
            'employeePermitRemaining',
            'position',
            'unit'
        ])->withCount([
            'employeeContracts',
            'employeeEmergencyContacts',
            'employeeContracts',
            'employeeEmergencyContacts',
            'employeeExperiences',
            'employeeAttachments',
            'employeeLanguageSkills',
            'employeeEducation',
            'employeeAchievements',
            'employeeCertificateOfExpertises',
            'employeeMediaSocial',
            'employeeOrganizationExperiences',
            'employeeRelationReferences',
        ])->useFilters()->dynamicPaginate();
    }

    public function findById($id)
    {
        return $this->model->canDelete()->with([
            'employeeType',
            'mainClass',
            'gender',
            'religion',
            'fieldOfWork',
            'workingArea',
            'employeePermitRemaining',
            'position',
            'unit',
            'employeeDetail',
            'employeeContact',
            'employeePermitRemaining',
            'employeeContracts',
            'employeeEmergencyContacts',
            'employeeExperiences',
            'employeeAttachments',
            'employeeLanguageSkills',
            'employeeEducation',
            'employeeAchievements',
            'employeeCertificateOfExpertises',
            'employeeMediaSocial',
            'employeeOrganizationExperiences',
            'employeeRelationReferences',
        ])
            ->withCount([
                'employeeContracts',
                'employeeEmergencyContacts',
                'employeeContracts',
                'employeeEmergencyContacts',
                'employeeExperiences',
                'employeeAttachments',
                'employeeLanguageSkills',
                'employeeEducation',
                'employeeAchievements',
                'employeeCertificateOfExpertises',
                'employeeMediaSocial',
                'employeeOrganizationExperiences',
                'employeeRelationReferences',
            ])
            ->useFilters()->findOrFail($id);
    }

    public function findByNik($nik)
    {
        return $this->model->canDelete()->with([
            'employeeType',
            'mainClass',
            'gender',
            'religion',
            'fieldOfWork',
            'workingArea',
            // 'employeeDetail',
            // 'employeeContact',
            // 'employeeContracts',
            'employeeEmergencyContacts',
        ])->useFilters()->where('nik', $nik)->first();
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
