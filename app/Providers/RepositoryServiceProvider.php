<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CarRepository;
use App\Interfaces\CarRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
