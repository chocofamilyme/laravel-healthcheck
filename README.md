# Laravel Health Check Library
Health Check library adds new endpoints(routes) to your project which are used to check some services of your application.
For example you want to check "Database Connection" of your microservice.

# Installation
```bash
composer require chocofamilyme/laravel-healthcheck ^0.0
```

# Publishing the configuration (optional)
```bash
php artisan vendor:publish --provider="Chocofamilyme\LaravelHealthCheck\Providers\HealthCheckServiceProvider"
```

# Checks
- Database connection check
- Cache write&read check
- Sessions write&read check

# Routes
- /health
```json
{
  "DB": "OK",
  "CACHE": "OK",
  "SESSIONS": "CRITICAL"
}
```
- /health/extendet
```json
{
  "DB": {
    "STATUS": "OK",
    "STATUS_BOOL": true,
    "MESSAGE": null
  },
  "CACHE": {
    "STATUS": "OK",
    "STATUS_BOOL": true,
    "MESSAGE": null
  },
  "SESSIONS": {
    "STATUS": "CRITICAL",
    "STATUS_BOOL": false,
    "MESSAGE": "Connection to tarantool.example.com failed"
  }
}
```

# How to write your custom checks
Create a class which implements Chocofamilyme\LaravelHealthCheck\Services\Checks\ComponentCheckInterface
and add it to healthcheck.php config file like
```php
return [
    'componentChecks' => [
        'YOURCUSTOMCHECK' => YourCustomCheck::class
    ]
]
```
