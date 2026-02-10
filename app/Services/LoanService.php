<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\LoanAlreadyReturnedException;
use App\Exceptions\LoanNotFoundException;
use App\Exceptions\OutOfStockException;
use App\Models\Loan;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\LoanRepositoryInterface;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

final readonly class LoanService
{
    public function __construct(
        private BookRepositoryInterface $books,
        private LoanRepositoryInterface $loans,
    ) {
    }

    public function createLoan(int $bookId, int $memberId): Loan
    {
        return DB::transaction(function () use ($bookId, $memberId): Loan {
            $ok = $this->books->decrementAvailableCopiesAtomic($bookId);

            if (! $ok) {
                throw OutOfStockException::forBookId($bookId);
            }

            $loanedAt = CarbonImmutable::now();
            $dueAt = $loanedAt->addDays(14);

            return $this->loans->create($bookId, $memberId, $loanedAt, $dueAt);
        });
    }

    public function returnLoan(int $loanId): void
    {
        DB::transaction(function () use ($loanId): void {
            $loan = $this->loans->findById($loanId);

            if ($loan === null) {
                throw LoanNotFoundException::forLoanId($loanId);
            }

            $ok = $this->loans->markReturnedIfNotReturned($loanId, CarbonImmutable::now());

            if (! $ok) {
                throw LoanAlreadyReturnedException::forLoanId($loanId);
            }

            $this->books->incrementAvailableCopies((int) $loan->book_id);
        });
    }
}
