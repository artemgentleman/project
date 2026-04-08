<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class AuthService implements AuthServiceInterface
{
    public function register(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return $user;
    }

    public function login(array $data): ?User
    {
        if (!Auth::attempt($data)) {
            throw new Exception("Invalid credentials");
        }

        return Auth::user();
    }

    public function logout()
    {
        Auth::logout();
    }

    public function user(): ?User
    {
       return Auth::user();
    }
}
