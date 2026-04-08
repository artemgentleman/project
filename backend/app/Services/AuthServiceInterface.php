<?php

namespace App\Services;

use App\Models\User;

interface AuthServiceInterface
{
    public function register(array $data): User;
    public function login(array $data): ?User;
    public function logout();
    public function user(): ?User;
}
