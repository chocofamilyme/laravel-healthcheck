<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable extendet health check endpoint
    |--------------------------------------------------------------------------
    |
    | Enable extendet endpoint for healthchecks with more information what
    | went wrong, this is dangerous because in the exception messages may be
    | confidential information
    |
    */

    'extendet' => false,

    /*
    |--------------------------------------------------------------------------
    | Component checks
    |--------------------------------------------------------------------------
    |
    | This array should contain all component check classes which are needet
    | to check some application functionality, e.g. like Database, Cache
    | or Sessions etc.
    | Feel free to add more. All of your component checks should implement
    | ComponentCheckInterface
    |
    */

    'componentChecks' => [
        'DB' => Chocofamilyme\LaravelHealthCheck\Services\Checks\DatabaseComponentCheck::class,
        'CACHE' => Chocofamilyme\LaravelHealthCheck\Services\Checks\CacheComponentCheck::class,
        'SESSIONS' => Chocofamilyme\LaravelHealthCheck\Services\Checks\SessionsComponentCheck::class,
    ]
];