<?php

namespace Chocofamilyme\LaravelHealthCheck\Services\Checks;

use RuntimeException;

class StorageComponentCheck implements ComponentCheckInterface
{
    /**
     * Perform check
     */
    public function check(): void
    {
        $file = storage_path('healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);

        $file = storage_path('app/healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);

        $file = storage_path('app/public/healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);

        $file = storage_path('logs/healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);

        $file = storage_path('framework/cache/healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);

        $file = storage_path('framework/cache/healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);

        $file = storage_path('framework/sessions/healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);

        $file = storage_path('framework/testing/healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);

        $file = storage_path('framework/views/healthcheck.txt');
        if($this->write($file, 'some data') === false)
            throw new RuntimeException("Failed to write to $file");
        $this->delete($file);
    }

    private function write($path, $content)
    {
        return @file_put_contents($path, $content) !== false;
    }

    private function delete($path)
    {
        return @unlink($path);
    }
}