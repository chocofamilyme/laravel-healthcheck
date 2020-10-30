<?php

namespace Chocofamilyme\LaravelHealthCheck\Services\Checks;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use RuntimeException;

class CacheComponentCheck implements ComponentCheckInterface
{
    /**
     * Perform check
     */
    public function check(): void
    {
        $key   = Str::random();
        $value = Str::random();
        Cache::put($key, $value, 3);

        if (Cache::get($key) !== $value) {
            throw new RuntimeException('Cache does not works as expected');
        }
    }
}
