<?php

namespace App\Providers;

use App\Core\Contracts\Repositories\ExamQuestionRepositoryInterface;
use App\Core\Contracts\Repositories\ExamRepositoryInterface;
use App\Core\Contracts\Services\ExamQuestionServiceInterface;
use App\Core\Contracts\Services\ExamServiceInterface;
use App\Core\Repositories\ExamQuestionRepository;
use App\Core\Repositories\ExamRepository;
use App\Core\Services\ExamQuestionService;
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

        $this->app->bind(ExamQuestionRepositoryInterface::class, ExamQuestionRepository::class);
        $this->app->bind(ExamQuestionServiceInterface::class, ExamQuestionService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
