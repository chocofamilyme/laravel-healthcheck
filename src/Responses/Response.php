<?php

namespace Chocofamilyme\LaravelHealthCheck\Responses;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class Response implements ResponseInterface
{
    private const   OK                  = 'OK';
    private const   CRITICAL            = 'CRITICAL';
    protected const HTTP_STATUS_SUCCESS = 200;
    protected const HTTP_STATUS_FAIL    = 503;

    /**
     * Return data in a simple way
     *
     * @psalm-suppress UndefinedFunction
     *
     * @param array $checks
     *
     * @return SymfonyResponse
     */
    public function simpleResponse(array $checks): SymfonyResponse
    {
        $responseArray = [];
        $code          = self::HTTP_STATUS_SUCCESS;
        foreach ($checks as $checkTitle => $check) {
            if ($check['status']) {
                $responseArray[$checkTitle] = self::OK;
            } else {
                $code                       = self::HTTP_STATUS_FAIL;
                $responseArray[$checkTitle] = self::CRITICAL;
            }
        }

        return response()->json($responseArray, $code, [], JSON_PRETTY_PRINT);
    }

    /**
     * Return data in extendet way
     *
     * @psalm-suppress UndefinedFunction
     *
     * @param $checks
     *
     * @return SymfonyResponse
     */
    public function extendedResponse(array $checks): SymfonyResponse
    {
        $responseArray = [];
        $code          = self::HTTP_STATUS_SUCCESS;
        foreach ($checks as $checkTitle => $check) {
            if ($check['status']) {
                $responseArray[$checkTitle] = [
                    'STATUS'      => self::OK,
                    'STATUS_BOOL' => true,
                    'MESSAGE'     => $check['message'],
                ];
            } else {
                $code                       = self::HTTP_STATUS_FAIL;
                $responseArray[$checkTitle] = [
                    'STATUS'      => self::CRITICAL,
                    'STATUS_BOOL' => false,
                    'MESSAGE'     => $check['message'],
                ];
            }
        }

        return response()->json($responseArray, $code, [], JSON_PRETTY_PRINT);
    }
}
