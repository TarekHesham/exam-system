<?php

namespace App\Providers;

use App\Core\Contracts\Repositories\{
    GovernorateRepositoryInterface,
    SchoolRepositoryInterface,
    SubjectRepositoryInterface
};
use App\Core\Contracts\Services\{
    GovernorateServiceInterface,
    SchoolServiceInterface,
    SubjectServiceInterface
};
use App\Core\Repositories\{
    GovernorateRepository,
    SchoolRepository,
    SubjectRepository
};
use App\Core\Services\{
    GovernorateService,
    SchoolService,
    SubjectService
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositories & Services
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(SubjectServiceInterface::class, SubjectService::class);

        $this->app->bind(GovernorateRepositoryInterface::class, GovernorateRepository::class);
        $this->app->bind(GovernorateServiceInterface::class, GovernorateService::class);

        $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
        $this->app->bind(SchoolServiceInterface::class, SchoolService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
