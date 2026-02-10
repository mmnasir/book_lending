<?php

declare(strict_types=1);

use app\Http\Controllers\Api\BookController;
use app\Http\Controllers\Api\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'index']);
Route::post('/loans', [LoanController::class, 'store']);
Route::post('/loans/{loan}/return', [LoanController::class, 'return']);
