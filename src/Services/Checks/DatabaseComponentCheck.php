<?php

namespace Chocofamilyme\LaravelHealthCheck\Services\Checks;

use Illuminate\Support\Facades\DB;

class DatabaseComponentCheck implements ComponentCheckInterface
{
    /**
     * Perform check
     * @psalm-suppress UndefinedInterfaceMethod
     */
    public function check(): void
    {
        DB::connection()->getPdo();
    }
}
