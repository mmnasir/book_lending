<?php

declare(strict_types=1);

namespace App\Repositories;

interface BookRepositoryInterface
{
    public function all(): array;
}
