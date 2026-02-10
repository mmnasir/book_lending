<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    //todo construct
    public function __construct(private readonly BookRepositoryInterface $books)
    {
    }
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->books->all(),//todo need a seeder or post method to add books
        ]);
    }

}
