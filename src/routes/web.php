<?php

/** @psalm-suppress UndefinedFunction */

use Illuminate\Support\Facades\Route;

/** @psalm-suppress UndefinedFunction */
Route::get(
    config('healthcheck.routesimple', '/health'),
    'Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController@simple'
);

/** @psalm-suppress UndefinedFunction */
Route::get(
    config('healthcheck.routeextended', '/health/extended'),
    'Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController@extended'
);
