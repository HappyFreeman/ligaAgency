<?php

namespace App\Providers;

use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductRemoverServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\Services\CatalogDataCollectorService;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductCreationServiceContract::class, ProductService::class);
        $this->app->singleton(ProductUpdateServiceContract::class, ProductService::class);
        $this->app->singleton(ProductRemoverServiceContract::class, ProductService::class);

        $this->app->singleton(CatalogDataCollectorServiceContract::class, CatalogDataCollectorService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
