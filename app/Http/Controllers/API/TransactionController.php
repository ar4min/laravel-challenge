<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionSummaryResource;
use App\Models\Transaction;
use App\Repositories\Transaction\TransactionRepositoryInterface;
use App\Traits\CustomResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use CustomResponse;

    public function create(TransactionRequest $request, $type): JsonResponse
    {
        return $this->successResponse(
            new TransactionResource(Transaction::create($request->validatedByRules())),
            'Transaction Added successfully',
            201
        );
    }

    public function index(): JsonResponse
    {
        return $this->successResponse(
            func_response_resource(
                Transaction::all(),
                TransactionResource::class
            )
        );
    }

    public function summary(Request $request)
    {
        $queryTotal = Transaction::count();
        return $this->successResponse(
            func_response_resource(
                Transaction::all(),
                TransactionSummaryResource::class,
                [
                    'settings' => '',
                    'total_amount' => $queryTotal,
                ]
            )
        );
    }

}
