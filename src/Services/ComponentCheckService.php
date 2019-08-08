<?php

namespace Chocofamilyme\LaravelHealthCheck\Services;

use Chocofamilyme\LaravelHealthCheck\Services\Checks\ComponentCheckInterface;

class ComponentCheckService
{
    const OK = 'OK';
    const CRITICAL = 'CRITICAL';

    /**
     * @var array
     */
    private $checks;

    /**
     * ComponentCheck constructor.
     */
    public function __construct()
    {
        $this->checks = config('healthcheck.componentChecks');
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        $checkResponses = [];
        foreach($this->checks as $checkTitle => $check)
        {
            $response = $this->getStatus((new $check));
            $checkResponses[$checkTitle] = [
                'status' => $response['status'],
                'message' => $response['message'],
            ];
        }
        return $checkResponses;
    }

    /**
     * @param ComponentCheckInterface $check
     * @return array
     */
    private function getStatus(ComponentCheckInterface $check)
    {
        try
        {
            $check->check();
            return [
                'status' => true,
                'message' => null
            ];
        }
        catch(\Exception $exception)
        {
            return [
                'status' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }
}