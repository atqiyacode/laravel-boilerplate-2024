<?php

namespace Modules\Career\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Applicant\App\Services\CompanyInformation\CompanyInformationService;
use Modules\Applicant\App\Services\FAQ\FAQService;
use Modules\Applicant\App\Services\Gender\GenderService;
use Modules\Applicant\App\Services\JobVacancy\JobVacancyService;
use Modules\Applicant\App\Services\LevelOfEducation\LevelOfEducationService;
use Modules\Applicant\App\Services\PrivacyPolicy\PrivacyPolicyService;
use Modules\Applicant\App\Services\RecruitmentStep\RecruitmentStepService;
use Modules\Applicant\App\Services\Religion\ReligionService;
use Modules\Applicant\App\Services\TermAndCondition\TermAndConditionService;
use Modules\Applicant\App\Services\University\UniversityService;

class PublicController extends Controller
{
    protected $genderService,
        $religionService,
        $levelOfEducationService,
        $FAQService,
        $termService,
        $recruitmentStep,
        $companyInformation,
        $privacyPolicy,
        $jobVacancy,
        $universityService;

    public function __construct(

        GenderService $genderService,
        ReligionService $religionService,
        LevelOfEducationService $levelOfEducationService,
        FAQService $FAQService,
        TermAndConditionService $termService,
        RecruitmentStepService $recruitmentStep,
        CompanyInformationService $companyInformation,
        PrivacyPolicyService $privacyPolicy,
        JobVacancyService $jobVacancy,
        UniversityService $universityService,

    ) {

        $this->genderService = $genderService;
        $this->religionService = $religionService;
        $this->levelOfEducationService = $levelOfEducationService;
        $this->FAQService = $FAQService;
        $this->FAQService = $FAQService;
        $this->termService = $termService;
        $this->recruitmentStep = $recruitmentStep;
        $this->companyInformation = $companyInformation;
        $this->privacyPolicy = $privacyPolicy;
        $this->jobVacancy = $jobVacancy;
        $this->universityService = $universityService;
    }

    public function genders()
    {
        $response = $this->genderService->getAllPublic();
        return $response->getResult();
    }

    public function religions()
    {
        $response = $this->religionService->getAllPublic();
        return $response->getResult();
    }

    public function levelOfEducations()
    {
        $response = $this->levelOfEducationService->getAllPublic();
        return $response->getResult();
    }

    public function university()
    {
        $response = $this->universityService->getAll();
        return $response->getResult();
    }

    public function faq()
    {
        $response = $this->FAQService->getAllPublic();
        return $response->getResult();
    }

    public function terms()
    {
        $response = $this->termService->findFirst();
        return $response->getResult();
    }

    public function recruitmentSteps()
    {
        $response = $this->recruitmentStep->getAllPublic();
        return $response->getResult();
    }

    public function companyInformation()
    {
        $response = $this->companyInformation->findFirst();
        return $response->getResult();
    }

    public function privacyPolicy()
    {
        $response = $this->privacyPolicy->findFirst();
        return $response->getResult();
    }

    public function jobVacancyList()
    {
        $response = $this->jobVacancy->getPaginateCareer();
        return $response->getResult();
    }

    public function jobVacancyDetail($slug)
    {
        $response = $this->jobVacancy->findBySlug($slug);
        return $response->getResult();
    }
}
