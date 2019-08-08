<?php

namespace Chocofamilyme\LaravelHealthCheck\Responses;

class DefaultResponse implements ResponseInterface
{
    const OK = 'OK';
    const CRITICAL = 'CRITICAL';

    /**
     * Return data in a simple way
     *
     * @param array $checks
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function simpleResponse(array $checks)
    {
        $responseArray = [];
        foreach($checks as $checkTitle => $check)
        {
            if($check['status'])
            {
                $responseArray[$checkTitle] = self::OK;
            }
            else
            {
                $responseArray[$checkTitle] = self::CRITICAL;
            }
        }

        return response()->json($responseArray, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Return data in extendet way
     *
     * @param $checks
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function extendetResponse(array $checks)
    {
        $responseArray = [];
        foreach($checks as $checkTitle => $check)
        {
            if($check['status'])
            {
                $responseArray[$checkTitle] = [
                    'STATUS' => self::OK,
                    'STATUS_BOOL' => true,
                    'MESSAGE' => $check['message']
                ];
            }
            else
            {
                $responseArray[$checkTitle] = [
                    'STATUS' => self::CRITICAL,
                    'STATUS_BOOL' => false,
                    'MESSAGE' => $check['message']
                ];
            }
        }

        return response()->json($responseArray, 200, [], JSON_PRETTY_PRINT);
    }
}