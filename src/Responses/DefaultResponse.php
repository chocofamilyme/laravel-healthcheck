<?php

namespace Chocofamilyme\LaravelHealthCheck\Responses;

use Illuminate\Http\Response;

class DefaultResponse implements ResponseInterface
{
    private const OK       = 'OK';
    private const CRITICAL = 'CRITICAL';

    /**
     * Return data in a simple way
     *
     * @psalm-suppress UndefinedFunction
     *
     * @param array $checks
     *
     * @return Response
     */
    public function simpleResponse(array $checks): Response
    {
        $responseArray = [];
        foreach ($checks as $checkTitle => $check) {
            if ($check['status']) {
                $responseArray[$checkTitle] = self::OK;
            } else {
                $responseArray[$checkTitle] = self::CRITICAL;
            }
        }

        return response()->json($responseArray, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Return data in extendet way
     *
     * @psalm-suppress UndefinedFunction
     *
     * @param $checks
     *
     * @return Response
     */
    public function extendetResponse(array $checks): Response
    {
        $responseArray = [];
        foreach ($checks as $checkTitle => $check) {
            if ($check['status']) {
                $responseArray[$checkTitle] = [
                    'STATUS'      => self::OK,
                    'STATUS_BOOL' => true,
                    'MESSAGE'     => $check['message'],
                ];
            } else {
                $responseArray[$checkTitle] = [
                    'STATUS'      => self::CRITICAL,
                    'STATUS_BOOL' => false,
                    'MESSAGE'     => $check['message'],
                ];
            }
        }

        return response()->json($responseArray, 200, [], JSON_PRETTY_PRINT);
    }
}
