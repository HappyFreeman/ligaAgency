<?php

namespace App\Providers;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Repositories\ProductsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductsRepositoryContract::class, ProductsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
