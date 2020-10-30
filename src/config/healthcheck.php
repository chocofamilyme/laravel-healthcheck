<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Route for the simple response
    |--------------------------------------------------------------------------
    |
    | Specify route for the simple response
    |
    */

    'routesimple' => '/health',

    /*
    |--------------------------------------------------------------------------
    | Route for the extendet response
    |--------------------------------------------------------------------------
    |
    | Specify route for the extendet response
    |
    */

    'routeextendet' => '/health/extendet',

    /*
    |--------------------------------------------------------------------------
    | Response class
    |--------------------------------------------------------------------------
    |
    | Describes which response class to use to output the response.
    | Feel free to add your own response class, it should implement
    | Chocofamilyme\LaravelHealthCheck\Responses\ResponseInterface
    |
    */

    'response' => Chocofamilyme\LaravelHealthCheck\Responses\Response::class,

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
    | Chocofamilyme\LaravelHealthCheck\Services\Checks\ComponentCheckInterface
    |
    */

    'componentChecks' => [
        'DB' => Chocofamilyme\LaravelHealthCheck\Services\Checks\DatabaseComponentCheck::class,
        'CACHE' => Chocofamilyme\LaravelHealthCheck\Services\Checks\CacheComponentCheck::class,
        'SESSIONS' => Chocofamilyme\LaravelHealthCheck\Services\Checks\SessionsComponentCheck::class,
        //'STORAGE' => Chocofamilyme\LaravelHealthCheck\Services\Checks\StorageComponentCheck::class,
    ]
];
