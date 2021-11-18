<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Registration Req
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());

        return response()->success('Successfully Registered',['token' => $this->getToken($user)],201);
    }

    /**
     * Login Req
     */
    public function login(LoginRequest $request)
    {
        return $this->authenticate($request);
    }

    /**
     * Logout Req
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->success('Successfully Logout',[],200);
    }

    /**
     * Get User Req
     */
    public function user()
    {
        return response()->success('User loaded',auth('api')->user(),200);
    }

    /**
     * Authenticate user
     */
    function authenticate($request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->success('Successfully Loggedin',['token' => $this->getToken(auth('api')->user())],201);
        } else {
            return response()->error('Unauthorised',[],401);
        }
    }

    /**
     * Get token of authenticated user
     */
    function getToken($user) {
        return $user->createToken('PassAuth')->accessToken;
    }
}
