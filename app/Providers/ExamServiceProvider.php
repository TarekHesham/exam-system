<?php

namespace App\Providers;

use App\Contracts\Repositories\ExamRepositoryInterface;
use App\Contracts\Services\ExamServiceInterface;
use App\Core\Repositories\ExamRepository;
use App\Core\Services\ExamService;
use Illuminate\Support\ServiceProvider;

class ExamServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ExamRepositoryInterface::class, ExamRepository::class);
        $this->app->bind(ExamServiceInterface::class, ExamService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
