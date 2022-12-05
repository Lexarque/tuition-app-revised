<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user by email and password
     * 
     * @param LoginRequest $request
     * @return \Illuminate\Contracts\View\View|array
     */
    public function login(LoginRequest $request): \Illuminate\Contracts\View\View|array
    {
        return $request->validateByDB();
    }

    /**
     * Register user by email and password
     * 
     * @param RegisterRequest $request
     * @return void
     */
    public function register(RegisterRequest $request): void  
    {
       $request->createUser();
    }

    /**
     * Log out user
     * 
     * @return void
     */
    public function logout()
    {
        Auth::session_unset();
    }
}