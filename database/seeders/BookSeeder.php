<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::query()->insert([
            [
                'title' => 'X',
                'author' => 'Elias',
                'isbn' => '111',
                'available_copies' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Y',
                'author' => 'Nasir',
                'isbn' => '2222',
                'available_copies' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Z',
                'author' => 'Elias Nasir',
                'isbn' => '33333333',
                'available_copies' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
