<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(public readonly AuthServiceInterface $authService)
    {

    }

    public function register(RegisterRequest $request)
    {
        return response()->json([
            'message' => 'User registered',
            'user' => $this->authService->register($request->validated()),
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        try {
            $user = $this->authService->login($credentials);
        } catch (\Throwable $exception) {
            return response()->json([
                'error' => $exception->getMessage(),
            ], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'Logged in',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $this->authService->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }

    public function me()
    {
        return response()->json([
            'user' => $this->authService->user(),
        ]);
    }
}
