<?php

namespace Chocofamilyme\LaravelHealthCheck\Responses;

use Symfony\Component\HttpFoundation\Response as Response;

interface ResponseInterface
{
    /**
     * @param array $checks
     *
     * @return Response
     */
    public function simpleResponse(array $checks): Response;

    /**
     * @param array $checks
     *
     * @return Response
     */
    public function extendedResponse(array $checks): Response;
}
