<?php

namespace Modules\Employee\App\Http\Resources\Employee;

use Modules\Employee\App\Http\Resources\EmployeeAchievement\EmployeeAchievementResource;
use Modules\Employee\App\Http\Resources\EmployeeAttachment\EmployeeAttachmentResource;
use Modules\Employee\App\Http\Resources\EmployeeCertificateOfExpertise\EmployeeCertificateOfExpertiseResource;
use Modules\Employee\App\Http\Resources\EmployeeContact\EmployeeContactResource;
use Modules\Employee\App\Http\Resources\EmployeeContract\EmployeeContractResource;
use Modules\Employee\App\Http\Resources\EmployeeDetail\EmployeeDetailResource;
use Modules\Employee\App\Http\Resources\EmployeeEducation\EmployeeEducationResource;
use Modules\Employee\App\Http\Resources\EmployeeEmergencyContact\EmployeeEmergencyContactResource;
use Modules\Employee\App\Http\Resources\EmployeeExperience\EmployeeExperienceResource;
use Modules\Employee\App\Http\Resources\EmployeeLanguageSkill\EmployeeLanguageSkillResource;
use Modules\Employee\App\Http\Resources\EmployeeMediaSocial\EmployeeMediaSocialResource;
use Modules\Employee\App\Http\Resources\EmployeeOrganizationExperience\EmployeeOrganizationExperienceResource;
use Modules\Employee\App\Http\Resources\EmployeePermitRemaining\EmployeePermitRemainingResource;
use Modules\Employee\App\Http\Resources\EmployeeRelationReference\EmployeeRelationReferenceResource;
use Modules\Employee\App\Http\Resources\EmployeeType\EmployeeTypeResource;
use Modules\Employee\App\Http\Resources\FieldOfWork\FieldOfWorkResource;
use Modules\Employee\App\Http\Resources\Gender\GenderResource;
use Modules\Employee\App\Http\Resources\MainClass\MainClassResource;
use Modules\Employee\App\Http\Resources\Position\PositionResource;
use Modules\Employee\App\Http\Resources\Religion\ReligionResource;
use Modules\Employee\App\Http\Resources\Unit\UnitResource;
use Modules\Employee\App\Http\Resources\WorkingArea\WorkingAreaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'full_name' => $this->full_name,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir->format('Y-m-d'),
            'ttl' => $this->tempat_lahir . ', ' . $this->tanggal_lahir->isoFormat('LL'),

            'employee_type_id' => $this->employee_type_id,
            'gender_id' => $this->gender_id,
            'religion_id' => $this->religion_id,
            'field_of_work_id' => $this->field_of_work_id,
            'working_area_id' => $this->working_area_id,
            'position_id' => $this->position_id,
            'unit_id' => $this->unit_id,

            'age' => __('client.age', ['age' => $this->age]),

            'employeeType' => new EmployeeTypeResource($this->employeeType),
            'gender' => new GenderResource($this->gender),
            'religion' => new ReligionResource($this->religion),
            'fieldOfWork' => new FieldOfWorkResource($this->fieldOfWork),
            'workingArea' => new WorkingAreaResource($this->workingArea),
            'position' => new PositionResource($this->position),
            'unit' => new UnitResource($this->unit),
            'mainClass' => new MainClassResource($this->mainClass),


            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),

            // count
            'employee_emergency_contact_count' => $this->employee_emergency_contact_count,
            'employee_contracts_count' => $this->employee_contracts_count,
            'employee_experiences_count' => $this->employee_experiences_count,
            'employee_attachments_count' => $this->employee_attachments_count,
            'employee_language_skills_count' => $this->employee_language_skills_count,
            'employee_education_count' => $this->employee_education_count,
            'employee_achievements_count' => $this->employee_achievements_count,
            'employee_certificate_of_expertises_count' => $this->employee_certificate_of_expertises_count,
            'employee_media_social_count' => $this->employee_media_social_count,
            'employee_organization_experiences_count' => $this->employee_organization_experiences_count,
            'employee_relation_references_count' => $this->employee_relation_references_count,

            // only on detail

            'employeeDetail' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return new EmployeeDetailResource($this->employeeDetail);
            }),
            'employeeContact' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return new EmployeeContactResource($this->employeeContact);
            }),
            'employeePermitRemaining' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return new EmployeePermitRemainingResource($this->employeePermitRemaining);
            }),

            'employeeContracts' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeContractResource::collection($this->employeeContracts);
            }),
            'employeeEmergencyContacts' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeEmergencyContactResource::collection($this->employeeEmergencyContacts);
            }),
            'employeeExperiences' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeExperienceResource::collection($this->employeeExperiences);
            }),
            'employeeAttachments' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeAttachmentResource::collection($this->employeeAttachments);
            }),
            'employeeLanguageSkills' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeLanguageSkillResource::collection($this->employeeLanguageSkills);
            }),
            'employeeEducation' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeEducationResource::collection($this->employeeEducation);
            }),
            'employeeAchievements' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeAchievementResource::collection($this->employeeAchievements);
            }),
            'employeeCertificateOfExpertises' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeCertificateOfExpertiseResource::collection($this->employeeCertificateOfExpertises);
            }),
            'employeeMediaSocial' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeMediaSocialResource::collection($this->employeeMediaSocial);
            }),
            'employeeOrganizationExperiences' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeOrganizationExperienceResource::collection($this->employeeOrganizationExperiences);
            }),
            'employeeRelationReferences' => $this->when(request()->route()->getName() !== 'employees.index', function () {
                return EmployeeRelationReferenceResource::collection($this->employeeRelationReferences);
            }),
        ];
    }
}
