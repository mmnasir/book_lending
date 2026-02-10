<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Loan;
use DateTimeInterface;

final class EloquentLoanRepository implements LoanRepositoryInterface
{
    public function create(int $bookId, int $memberId, DateTimeInterface $loanedAt, DateTimeInterface $dueAt): Loan
    {
        return Loan::query()->create([
            'book_id' => $bookId,
            'member_id' => $memberId,
            'loaned_at' => $loanedAt,
            'due_at' => $dueAt,
            'returned_at' => null,
        ]);
    }

    public function findById(int $loanId): ?Loan
    {
        return Loan::query()->find($loanId);
    }

    public function markReturnedIfNotReturned(int $loanId, DateTimeInterface $returnedAt): bool
    {
        $affected = Loan::query()
            ->whereKey($loanId)
            ->whereNull('returned_at')
            ->update(['returned_at' => $returnedAt]);

        return $affected > 0;
    }
}
