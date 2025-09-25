<?php

namespace App\Providers;

use App\Core\Contracts\Repositories\{GovernorateRepositoryInterface, SubjectRepositoryInterface};
use App\Core\Contracts\Services\{GovernorateServiceInterface, SubjectServiceInterface};
use App\Core\Repositories\{GovernorateRepository, SubjectRepository};
use App\Core\Services\{GovernorateService, SubjectService};
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
        $this->app->bind(GovernorateRepositoryInterface::class, GovernorateRepository::class);
        $this->app->bind(GovernorateServiceInterface::class, GovernorateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
