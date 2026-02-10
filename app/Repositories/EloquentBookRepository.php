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
}
