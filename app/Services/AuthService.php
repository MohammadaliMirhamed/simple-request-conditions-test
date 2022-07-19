<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthService
{
    
    /**
     * Register user
     * 
     * @param  RegisterRequest $request
     * @return mixed
     */
    public function Register(RegisterRequest $request) :mixed
    {
        // filter the request data
        $request = $request->only(['name', 'email', 'password']);

        // create the user password
        $request['password'] = bcrypt($request['password']);

        // create the user
        $user = User::create($request);

        // create a token for the user
        $token = $user->createToken('API Token')->accessToken;

        // response message
        $message = 'User created successfully.';

        return [
            'details' => [
                'message' => $message,
                'data' => [
                    'user' => $user,
                    'token' => $token
                ],
            ],
            'status' => Response::HTTP_CREATED
        ];
    } 

    /**
     * Login user
     * 
     * @param  LoginRequest $request
     * @return mixed
     */
    public function Login(LoginRequest $request) :mixed
    {
        // filter the request data
        $request = $request->only(['email', 'password']);

        // attempt to login the user
        if (!auth()->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return [
                'details' => [
                    'message' => 'Incorrect Details. Please try again'
                ],
                'status' => Response::HTTP_UNAUTHORIZED
            ];
        }

        // create a token for the user
        $token = auth()->user()->createToken('API Token')->accessToken;

        // response message
        $message = 'User logged in successfully.';

        // return the user and token
        return [
            'details' => [
                'message' => $message,
                'data' => [
                    'user' => auth()->user(),
                    'token' => $token
                ],
            ],
            'status' => Response::HTTP_OK
        ];
    }
}