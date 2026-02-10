<?php

declare(strict_types=1);

namespace App\Exceptions;

use RuntimeException;

final class LoanAlreadyReturnedException extends RuntimeException
{
    public static function forLoanId(int $loanId): self
    {
        return new self("Loan {$loanId} is already returned.");
    }
}
