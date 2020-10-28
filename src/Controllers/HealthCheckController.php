<?php

namespace Chocofamilyme\LaravelHealthCheck\Controllers;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Routing\Controller;
use Chocofamilyme\LaravelHealthCheck\Services\ComponentCheckService;

class HealthCheckController extends Controller
{
    private ComponentCheckService $componentCheck;
    private Repository $config;

    /**
     * HealthCheckController constructor.
     *
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->componentCheck = new ComponentCheckService($config);
        $this->config         = $config;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function simple(): \Illuminate\Http\JsonResponse
    {
        $checks        = $this->componentCheck->getResponse();
        $responseClass = $this->config->get('healthcheck.response');

        return (new $responseClass())->simpleResponse($checks);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function extendet(): ?\Illuminate\Http\JsonResponse
    {
        if (!$this->config->get('healthcheck.extendet')) {
            return null;
        }

        $checks        = $this->componentCheck->getResponse();
        $responseClass = $this->config->get('healthcheck.response');

        return (new $responseClass())->extendetResponse($checks);
    }
}
