<?php

namespace Chocofamilyme\LaravelHealthCheck\Responses;

use Illuminate\Http\Response;

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
    public function extendetResponse(array $checks): Response;
}
