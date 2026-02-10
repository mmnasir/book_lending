<?php

declare(strict_types=1);

namespace App\Exceptions;

use RuntimeException;

final class OutOfStockException extends RuntimeException
{
    public static function forBookId(int $bookId): self
    {
        return new self("Books {$bookId} is not available");
    }
}
