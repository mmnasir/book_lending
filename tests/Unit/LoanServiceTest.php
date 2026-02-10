<?php

declare(strict_types=1);


namespace Tests\Unit;


use App\Exceptions\OutOfStockException;
use App\Models\Loan;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\LoanRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LoanServiceTest
{
    public function test_create_loan_successfully(): void
    {

    }

    public function test_create_loan_throws_out_of_stock_exception(): void
    {

    }

    //todo already returned exception


}


