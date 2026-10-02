<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {}

    public function register(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';

        return $this->userRepository->create($data);
    }

    public function searchPaginated(?string $search, int $perPage = 15)
    {
        return $this->userRepository->searchPaginated($search, $perPage);
    }

    public function getUserResults(string $userId)
    {
        return $this->userRepository->getUserResults($userId);
    }
}
