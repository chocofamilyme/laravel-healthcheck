<?php

Route::get('/health', 'Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController@simple');
Route::get('/health/extendet', 'Chocofamilyme\LaravelHealthCheck\Controllers\HealthCheckController@extendet');