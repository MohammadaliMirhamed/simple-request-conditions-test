<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Services\ProcessService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class ProcessController extends BaseController
{

    public function handle(Request $request, ProcessService $service)
    {
        $response = $service->handle($request);
        return $this->makeResponse($response['details'], $response['status']);
    }

}
