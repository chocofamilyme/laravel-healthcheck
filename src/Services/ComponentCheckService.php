<?php

namespace Chocofamilyme\LaravelHealthCheck\Services;

use Chocofamilyme\LaravelHealthCheck\Services\Checks\ComponentCheckInterface;
use Illuminate\Contracts\Config\Repository;

class ComponentCheckService
{
    /**
     * @var array
     */
    private $checks;

    /**
     * ComponentCheck constructor.
     *
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->checks = $config->get('healthcheck.componentChecks');
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        $checkResponses = [];
        foreach ($this->checks as $checkTitle => $check) {
            /** @var ComponentCheckInterface $component */
            $component                   = new $check();
            $response                    = $this->getStatus($component);
            $checkResponses[$checkTitle] = [
                'status'  => $response['status'],
                'message' => $response['message'],
            ];
        }

        return $checkResponses;
    }

    /**
     * @param ComponentCheckInterface $check
     *
     * @return array
     */
    private function getStatus(ComponentCheckInterface $check): array
    {
        try {
            $check->check();

            return [
                'status'  => true,
                'message' => null,
            ];
        } catch (\Exception $exception) {
            return [
                'status'  => false,
                'message' => $exception->getMessage(),
            ];
        }
    }
}
