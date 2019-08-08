<?php

namespace Chocofamilyme\LaravelHealthCheck\Controllers;

use App\Http\Controllers\Controller;
use Chocofamilyme\LaravelHealthCheck\Services\ComponentCheckService;

class HealthCheckController extends Controller
{
    /**
     * @var ComponentCheckService
     */
    private $componentCheck;

    /**
     * HealthCheckController constructor.
     */
    public function __construct()
    {
        $this->componentCheck = new ComponentCheckService();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function simple()
    {
        return response()->json($this->componentCheck->getSimpleResponse(), 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function extendet()
    {
        if(!config('healthcheck.extendet')) {
            return null;
        }

        return response()->json($this->componentCheck->getExtendetResponse(), 200, [], JSON_PRETTY_PRINT);
    }
}