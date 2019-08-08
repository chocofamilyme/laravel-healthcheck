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
    public function getSimpleResponse()
    {
        $checkResponses = [];
        foreach($this->checks as $checkTitle => $check)
        {
            $checkResponses[$checkTitle] = $this->getSimpleStatus((new $check));
        }
        return $checkResponses;
    }

    /**
     * @param ComponentCheckInterface $check
     * @return string
     */
    private function getSimpleStatus(ComponentCheckInterface $check)
    {
        try
        {
            $check->check();
            return self::OK;
        }
        catch(\Exception $exception)
        {
            return self::CRITICAL;
        }
    }

    /**
     * @return array
     */
    public function getExtendetResponse()
    {
        $checkResponses = [];
        foreach($this->checks as $checkTitle => $check)
        {
            $response = $this->getExtendetStatus((new $check));
            $checkResponses[$checkTitle] = [
                'STATUS' => $response['status'],
                'STATUS_BOOL' => $response['status_bool'],
                'MESSAGE' => $response['message'],
            ];
        }
        return $checkResponses;
    }

    /**
     * @param ComponentCheckInterface $check
     * @return array
     */
    private function getExtendetStatus(ComponentCheckInterface $check)
    {
        try
        {
            $check->check();
            return [
                'status' => self::OK,
                'status_bool' => true,
                'message' => null
            ];
        }
        catch(\Exception $exception)
        {
            return [
                'status' => self::CRITICAL,
                'status_bool' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }
}