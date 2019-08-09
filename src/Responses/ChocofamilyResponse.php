<?php

namespace Chocofamilyme\LaravelHealthCheck\Responses;

class ChocofamilyResponse implements ResponseInterface
{
    const OK = 'OK';
    const CRITICAL = 'CRITICAL';

    /**
     * Return data in a simple way
     *
     * @param $checks
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function simpleResponse(array $checks)
    {
        $responseArray = [
            'error_code' => null,
            'status' => null,
            'message' => null,
            'data' => null
        ];
        $atLeastOneCheckIsCritical = false;
        foreach($checks as $checkTitle => $check)
        {
            if($check['status'])
            {
                $responseArray['data'][$checkTitle] = self::OK;
            }
            else
            {
                $atLeastOneCheckIsCritical = true;
                $responseArray['data'][$checkTitle] = self::CRITICAL;
            }
        }
        $this->wrapArrayWithData($atLeastOneCheckIsCritical, $responseArray);

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
        $responseArray = [
            'error_code' => null,
            'status' => null,
            'message' => null,
            'data' => null
        ];
        $atLeastOneCheckIsCritical = false;
        foreach($checks as $checkTitle => $check)
        {
            if($check['status'])
            {
                $responseArray['data'][$checkTitle] = [
                    'STATUS' => self::OK,
                    'STATUS_BOOL' => true,
                    'MESSAGE' => $check['message']
                ];
            }
            else
            {
                $atLeastOneCheckIsCritical = true;
                $responseArray['data'][$checkTitle] = [
                    'STATUS' => self::CRITICAL,
                    'STATUS_BOOL' => false,
                    'MESSAGE' => $check['message']
                ];
            }
        }
        $this->wrapArrayWithData($atLeastOneCheckIsCritical, $responseArray);

        return response()->json($responseArray, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Add some keydata to respose array
     *
     * @param $state
     * @param $responseArray
     */
    private function wrapArrayWithData($state, &$responseArray)
    {
        if($state)
        {
            $responseArray['error_code'] = 500;
            $responseArray['status'] = 'error';
            $responseArray['message'] = 'There are some critical checks';
        }
        else
        {
            $responseArray['error_code'] = 0;
            $responseArray['status'] = 'success';
            $responseArray['message'] = 'Everything is fine';
        }
    }
}