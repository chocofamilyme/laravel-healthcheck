<?php

namespace Chocofamilyme\LaravelHealthCheck\Controllers;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    public function simple(): JsonResponse
    {
        $checks        = $this->componentCheck->getResponse();
        $responseClass = $this->config->get('healthcheck.response');

        return (new $responseClass())->simpleResponse($checks);
    }

    /**
     * @return JsonResponse
     */
    public function extended(): ?JsonResponse
    {
        if (!$this->config->get('healthcheck.extended')) {
            return null;
        }

        $checks        = $this->componentCheck->getResponse();
        $responseClass = $this->config->get('healthcheck.response');

        return (new $responseClass())->extendedResponse($checks);
    }
}
