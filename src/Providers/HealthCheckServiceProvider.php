<?php

namespace Chocofamilyme\LaravelHealthCheck\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class HealthCheckServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function register()
    {
        // Route
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Controller
        $this->app->make(\Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController::class);

        // Merge our config with application config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/healthcheck.php',
            'healthcheck'
        );
    }

    /**
     * Bootstrap services.
     *
     * @psalm-suppress UndefinedFunction
     * @return void
     */
    public function boot()
    {
        // Config
        $this->publishes(
            [
                __DIR__ . '/../config/healthcheck.php' => config_path('healthcheck.php'),
            ]
        );
    }
}
