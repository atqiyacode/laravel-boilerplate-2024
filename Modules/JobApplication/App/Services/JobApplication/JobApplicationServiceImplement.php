<?php

namespace Modules\JobApplication\App\Services\JobApplication;

use Modules\JobApplication\App\Http\Resources\JobApplication\JobApplicationResource;
use Modules\JobApplication\Modules\Applicant\App\Models\ApplicantResume;
use Modules\JobApplication\App\Models\Employee;
use Modules\JobApplication\App\Models\EmployeeAchievement;
use Modules\JobApplication\App\Models\EmployeeAttachment;
use Modules\JobApplication\App\Models\EmployeeCertificateOfExpertise;
use Modules\JobApplication\App\Models\EmployeeContract;
use Modules\JobApplication\App\Models\EmployeeDetail;
use Modules\JobApplication\App\Models\EmployeeEducation;
use Modules\JobApplication\App\Models\EmployeeExperience;
use Modules\JobApplication\App\Models\EmployeeLanguageSkill;
use Modules\JobApplication\App\Models\EmployeeMediaSocial;
use Modules\JobApplication\App\Models\EmployeeOrganizationExperience;
use Modules\JobApplication\App\Models\EmployeeRelationReference;
use Modules\JobApplication\App\Models\JobApplication;
use Modules\JobApplication\App\Models\JobVacancy;
use Modules\JobApplication\App\Models\User;
use LaravelEasyRepository\ServiceApi;
use Illuminate\Support\Facades\DB;
use Modules\JobApplication\App\Repositories\JobApplication\JobApplicationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationServiceImplement extends ServiceApi implements JobApplicationService
{

    /**
     * set message api for CRUD
     * @param string $title
     * @param string $create_message
     * @param string $update_message
     * @param string $delete_message
     * @param string $restore_message
     * @param string $destroy_message
     * @param string $found_message
     */
    protected $title = "";
    protected $create_message = "";
    protected $update_message = "";
    protected $delete_message = "";
    protected $restore_message = "";
    protected $destroy_message = "";
    protected $found_message = "";

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(JobApplicationRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getPaginate()
    {
        $response = $this->mainRepository->getPaginate();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult(JobApplicationResource::collection($response));
    }

    public function getAll()
    {
        $response = $this->mainRepository->getAll();
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult(JobApplicationResource::collection($response));
    }

    public function findById($id)
    {
        $response = $this->mainRepository->findById($id);
        return $this->setMessage(__('alert.success-found'))
            ->setStatus(true)
            ->setCode(200)
            ->setResult(new JobApplicationResource($response));
    }

    public function create($data)
    {
        $response = DB::transaction(function () use ($data) {
            return $this->mainRepository->create($data);
        });
        $count = $response ? 1 : 0;
        $message = trans_choice('alert.success-save', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setStatus(true)
            ->setCode(201)
            ->setResult(new JobApplicationResource($response));
    }

    public function update($id, $data)
    {
        $response = DB::transaction(function () use ($id, $data) {
            return $this->mainRepository->update($id, $data);
        });
        $count = $response ? 1 : 0;
        $message = trans_choice('alert.success-update', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setCode(200)
            ->setResult(new JobApplicationResource($response));
    }

    public function delete($id)
    {
        $response = DB::transaction(function () use ($id) {
            return $this->mainRepository->delete($id);
        });
        $count = $response;
        $message = trans_choice('alert.success-delete', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }

    public function restore($id)
    {
        $response = DB::transaction(function () use ($id) {
            return $this->mainRepository->restore($id);
        });
        $count = $response;
        $message = trans_choice('alert.success-restored', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }

    public function forceDelete($id)
    {
        $response = DB::transaction(function () use ($id) {
            return $this->mainRepository->forceDelete($id);
        });
        $count = $response;
        $message = trans_choice('alert.success-deleted-permanent', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }

    public function destroyMultiple($ids)
    {
        $response = DB::transaction(function () use ($ids) {
            return $this->mainRepository->destroyMultiple($ids);
        });
        $count = $response;
        $message = trans_choice('alert.success-delete', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }

    public function restoreMultiple($ids)
    {
        $response = DB::transaction(function () use ($ids) {
            return $this->mainRepository->restoreMultiple($ids);
        });
        $count = $response;
        $message = trans_choice('alert.success-restored', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }

    public function forceDeleteMultiple($ids)
    {
        $response = DB::transaction(function () use ($ids) {
            return $this->mainRepository->forceDeleteMultiple($ids);
        });
        $count = $response;
        $message = trans_choice('alert.success-deleted-permanent', $count, ['count' => $count]);
        return $this->setMessage($message)
            ->setStatus(true)
            ->setCode(200)
            ->setResult($response);
    }

    public function export($format)
    {
        return $this->mainRepository->export($format);
    }

    public function action($request, $id)
    {
        $response = DB::transaction(function () use ($request, $id) {
            $data = $this->updateJobApplicationStatus($request, $id);

            if ($request->status == 5) {
                $this->processAcceptedApplication($data);
            }
        });

        $count = $response ? 1 : 0;
        $message = trans_choice('alert.success-update', $count, ['count' => $count]);

        return $this->setMessage($message)
            ->setStatus(true)
            ->setCode(200);
    }

    protected function updateJobApplicationStatus($request, $id)
    {
        $data = JobApplication::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        if ($request->status == 5) {
            $position = JobVacancy::find($data->job_vacancy_id)->position;
            $data->keterangan = 'Lamaran diterima pada lowongan pekerjaan ' . $position->name;
            $data->save();
        }

        return $data;
    }

    protected function processAcceptedApplication($jobApplication)
    {
        $applicantResume = ApplicantResume::find($jobApplication->applicant_resume_id);
        $user = User::findOrFail($jobApplication->user_id);

        $employee = $this->getOrCreateEmployee($applicantResume, $user);

        $this->updateEmployeeDetails($employee, $applicantResume);
        $this->updateEmployeeAttachments($employee, $applicantResume);
        $this->updateEmployeeEducations($employee, $applicantResume);
        // ... update other employee information ...
        $this->updateEmployeeContracts($employee);
        $this->updateEmployeeDetailsStatus($employee);
        // ... update other related entities ...
        $user->username = $applicantResume->nik;
        $user->save();

        //delete lamaran dia ditempat yang lain saat ini -> status = 6 untuk tolak
        $this->rejectOtherApplications($applicantResume, $jobApplication);

        $user->assignRole(['employee']);
    }

    protected function getOrCreateEmployee($applicantResume, $user)
    {
        $employee = Employee::where('nik', $user->username)->first();

        if (!$employee) {
            $employee = Employee::create([
                'nama' => $user->name,
                'nik' => $applicantResume->nik,
                'no_whatsapp' => $user->phone,
                'tempat_lahir' => $applicantResume->tempat_lahir,
                // ... other employee fields ...
            ]);
        }

        return $employee;
    }

    protected function updateEmployeeDetails($employee, $applicantResume)
    {
        $employee->update([
            'tempat_lahir' => $applicantResume->tempat_lahir,
            'tanggal_lahir' => $applicantResume->tanggal_lahir,
            'jenis_kelamin' => $applicantResume->jenis_kelamin,
            'alamat_domisili' => $applicantResume->alamat_domisili,
            'alamat_ktp' => $applicantResume->alamat_ktp,
            'agama' => $applicantResume->agama,
            'tentang_diri' => $applicantResume->tentang_diri,
            'other_fields' => $applicantResume->other_fields,
        ]);
    }

    // ... other update methods for attachments, educations, etc. ...

    protected function updateEmployeeContracts($employee)
    {
        $employeeContract = EmployeeContract::where('employee_id', $employee->id)
            ->where('status', 1)
            ->first();

        if ($employeeContract) {
            $employeeContract->status = 0;
            $employeeContract->save();
        }
    }

    protected function updateEmployeeDetailsStatus($employee)
    {
        $employeeDetail = EmployeeDetail::where('employee_id', $employee->id)
            ->where('status', 1)
            ->first();

        if ($employeeDetail) {
            $employeeDetail->status = 0;
            $employeeDetail->save();
        }

        $employeeDetailNew = EmployeeDetail::create([
            'employee_id' => $employee->id,
            'position_id' => 1, // You may need to adjust this based on your logic
            'employee_unit_id' => 1,
            'employee_class_id' => 1,
        ]);
    }

    protected function rejectOtherApplications($applicantResume, $jobApplication)
    {
        JobApplication::whereUserId($applicantResume->user_id)
            ->where('id', '!=', $jobApplication->id)
            ->update([
                'status' => 6,
                'keterangan' => 'Lamaran ditolak karena sudah diterima di lowongan pekerjaan ' . $jobApplication->position->name,
            ]);
    }
}
