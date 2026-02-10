<?php


declare(strict_types=1);

namespace Tests\Unit;

use App\Exceptions\OutOfStockException;
use App\Models\Loan;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\LoanRepositoryInterface;
use App\Services\LoanService;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;

final class LoanServiceTest extends TestCase
{
    public function test_create_loan_success(): void
    {
        DB::shouldReceive('transaction')->once()->andReturnUsing(static fn ($cb) => $cb());

        $books = $this->createMock(BookRepositoryInterface::class);
        $loans = $this->createMock(LoanRepositoryInterface::class);

        $books->expects($this->once())
            ->method('decrementAvailableCopiesAtomic')
            ->with(1)
            ->willReturn(true);

        $loan = new Loan();
        $loan->id = 10;
        $loan->book_id = 1;
        $loan->member_id = 2;

        $loans->expects($this->once())
            ->method('create')
            ->with(
                1,
                2,
                $this->isInstanceOf(CarbonImmutable::class),
                $this->isInstanceOf(CarbonImmutable::class),
            )
            ->willReturn($loan);

        $service = new LoanService($books, $loans);

        $result = $service->createLoan(1, 2);

        $this->assertSame(10, $result->id);
        $this->assertSame(1, (int) $result->book_id);
        $this->assertSame(2, (int) $result->member_id);
    }

    public function test_create_loan_out_of_stock(): void
    {
        DB::shouldReceive('transaction')->once()->andReturnUsing(static fn ($cb) => $cb());

        $books = $this->createMock(BookRepositoryInterface::class);
        $loans = $this->createMock(LoanRepositoryInterface::class);

        $books->expects($this->once())
            ->method('decrementAvailableCopiesAtomic')
            ->with(99)
            ->willReturn(false);

        $loans->expects($this->never())
            ->method('create');

        $service = new LoanService($books, $loans);

        $this->expectException(OutOfStockException::class);

        $service->createLoan(99, 2);
    }

    //todo already returned exception

}
