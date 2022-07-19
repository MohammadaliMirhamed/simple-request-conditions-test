<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Response;


class AuthController extends BaseController
{
    /**
     * @param RegisterRequest $request
     * @param AuthService $authService
     * @return Response
     */
    public function register(RegisterRequest $request, AuthService $authService) :Response
    {
        $response = $authService->register($request);
        return $this->makeResponse($response['details'], $response['status']);
    }

    /**
     * @param LoginRequest $request
     * @param AuthService $authService
     * @return Response
     */
    public function Login(LoginRequest $request, AuthService $authService) :Response 
    {
        $response = $authService->Login($request);
        return $this->makeResponse($response['details'], $response['status']);

    }

}
