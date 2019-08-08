<?php
Route::get(config('healthcheck.routesimple', '/health'), 'Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController@simple');
Route::get(config('healthcheck.routeextendet', '/health/extendet'), 'Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController@extendet');