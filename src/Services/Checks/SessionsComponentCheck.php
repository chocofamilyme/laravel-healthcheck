<?php

namespace Chocofamilyme\LaravelHealthCheck\Services\Checks;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RuntimeException;

class SessionsComponentCheck implements ComponentCheckInterface
{
    /**
     * Perform check
     */
    public function check(): void
    {
        $key   = Str::random();
        $value = Str::random();
        Session::put($key, $value);

        if (Session::get($key) !== $value) {
            throw new RuntimeException('Sessions does not works as expected');
        }
    }
}
