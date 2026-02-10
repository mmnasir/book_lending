<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLoanRequest;
use App\Models\Loan;
use Illuminate\Http\JsonResponse;
use App\Services\LoanService;

class LoanController extends Controller
{
    //todo construct
    public function __construct(private readonly LoanService $loanService)
    {
    }

    public function store(CreateLoanRequest $request): JsonResponse
    {
        //todo validate request
        //todo create loan
        $loan = $this->loanService->createLoan(
            (int) $request->validated('book_id'),
            (int) $request->validated('member_id'),
        );
        return response()->json(['data' => $loan], 201);
    }

    public function return(int $id): JsonResponse
    {
        //todo validate request
        //todo return loan
        $this->loanService->returnLoan($id);

        return response()->json(['message' => 'Returned!!Done!!']);
    }

}
