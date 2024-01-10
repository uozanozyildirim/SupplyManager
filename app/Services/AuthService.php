<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AuthService {

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request) {

        $this->userRepository->create($request);

    }

    public function login(string $email, string $password) {

        // Login User


    }

    public function logout(User $user) {

        // Clear authentication

    }

}
