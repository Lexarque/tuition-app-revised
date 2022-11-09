<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     */
    public function login(LoginRequest $request)
    {

    }

    /**
     */
    public function register(RegisterRequest $request) 
    {
       
    }

    /**
     * Log out user (Invalidate the token)
     * 
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        
    }
}