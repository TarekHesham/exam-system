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
     * All of the container singletons that should be registered.
     * @var array
     */
    public $singletons = [
        SchoolRepositoryInterface::class => SchoolRepository::class,
        SchoolServiceInterface::class    => SchoolService::class,

        SubjectRepositoryInterface::class => SubjectRepository::class,
        SubjectServiceInterface::class    => SubjectService::class,

        GovernorateRepositoryInterface::class => GovernorateRepository::class,
        GovernorateServiceInterface::class    => GovernorateService::class,
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
