<?php

namespace Chocofamilyme\LaravelHealthCheck\Services\Checks;

interface ComponentCheckInterface
{
    /**
     * Perform check
     */
    public function check(): void;
}
