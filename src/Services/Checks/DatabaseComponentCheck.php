<?php

namespace Chocofamilyme\LaravelHealthCheck\Services\Checks;

use Illuminate\Support\Facades\DB;

class DatabaseComponentCheck implements ComponentCheckInterface
{
    /**
     * Perform check
     */
    public function check(): void
    {
        DB::connection()->getPdo();
    }
}