<?php

namespace App\Providers;

use App\Repositories\BookRepositoryInterface;
use App\Repositories\EloquentBookRepository;
use App\Repositories\EloquentLoanRepository;
use App\Repositories\LoanRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookRepositoryInterface::class, EloquentBookRepository::class);
        $this->app->bind(LoanRepositoryInterface::class, EloquentLoanRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
