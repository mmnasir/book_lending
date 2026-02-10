<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Loan;
use DateTimeInterface;

interface LoanRepositoryInterface
{
    public function create(int $bookId, int $memberId, DateTimeInterface $loanedAt, DateTimeInterface $dueAt): Loan;

    public function findById(int $loanId): ?Loan;

    public function markReturnedIfNotReturned(int $loanId, DateTimeInterface $returnedAt): bool;
}
