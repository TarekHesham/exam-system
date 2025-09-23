<?php

namespace App\Providers;

use App\Core\Contracts\Repositories\SubjectRepositoryInterface;
use App\Core\Contracts\Services\SubjectServiceInterface;
use App\Core\Repositories\SubjectRepository;
use App\Core\Services\SubjectService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(SubjectServiceInterface::class, SubjectService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
