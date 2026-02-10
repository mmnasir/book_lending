<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Book;

final class EloquentBookRepository implements BookRepositoryInterface
{
    public function all(): array
    {
        return Book::query()
            ->select(['id', 'title', 'author', 'isbn', 'available_copies'])
            ->orderBy('id')
            ->get()
            ->toArray();
    }

    public function decrementAvailableCopiesAtomic(int $bookId): bool
    {
        $affected = Book::query()
            ->whereKey($bookId)
            ->where('available_copies', '>', 0)
            ->decrement('available_copies');

        return $affected > 0;
    }

    public function incrementAvailableCopies(int $bookId): void
    {
        Book::query()
            ->whereKey($bookId)
            ->increment('available_copies');
    }
}
