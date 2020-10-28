<?php

use Illuminate\Support\Facades\Route;

/** @psalm-suppress UndefinedFunction */
Route::get(
    config('healthcheck.routesimple', '/health'),
    'Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController@simple'
);

/** @psalm-suppress UndefinedFunction */
Route::get(
    config('healthcheck.routeextendet', '/health/extendet'),
    'Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController@extendet'
);
