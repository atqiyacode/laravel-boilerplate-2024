<?php

namespace Modules\Finance\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Finance\App\Http\Requests\PaymentPlan\CreatePaymentPlanRequest;
use Modules\Finance\App\Http\Requests\PaymentPlan\UpdatePaymentPlanRequest;
use Modules\Finance\App\Http\Resources\PaymentPlan\PaymentPlanResource;
use Modules\Finance\App\Models\PaymentPlan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class PaymentPlanController extends Controller
{
    public function __construct()
    {
    }

    public function index(): AnonymousResourceCollection
    {
        $paymentPlans = PaymentPlan::useFilters()->dynamicPaginate();

        return PaymentPlanResource::collection($paymentPlans);
    }

    public function store(CreatePaymentPlanRequest $request): JsonResponse
    {
        $paymentPlan = PaymentPlan::create($request->validated());

        return $this->responseCreated('PaymentPlan created successfully', new PaymentPlanResource($paymentPlan));
    }

    public function show(PaymentPlan $paymentPlan): JsonResponse
    {
        return $this->responseSuccess(null, new PaymentPlanResource($paymentPlan));
    }

    public function update(UpdatePaymentPlanRequest $request, PaymentPlan $paymentPlan): JsonResponse
    {
        $paymentPlan->update($request->validated());

        return $this->responseSuccess('PaymentPlan updated Successfully', new PaymentPlanResource($paymentPlan));
    }

    public function destroy(PaymentPlan $paymentPlan): JsonResponse
    {
        $paymentPlan->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $paymentPlan = PaymentPlan::onlyTrashed()->useFilters()->findOrFail($id);

        $paymentPlan->restore();

        return $this->responseSuccess('PaymentPlan restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $paymentPlan = PaymentPlan::withTrashed()->useFilters()->findOrFail($id);

        $paymentPlan->forceDelete();

        return $this->responseDeleted();
    }
}
