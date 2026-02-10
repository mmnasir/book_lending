<?php

declare(strict_types=1);

namespace App\Exceptions;

use RuntimeException;

final class LoanNotFoundException extends RuntimeException
{
    public static function forLoanId(int $loanId): self
    {
        return new self("Loan {$loanId} was not found.");
    }
}
