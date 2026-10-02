<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * Create a new user record.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * Search and paginate users with their completed exam session count.
     *
     * @return LengthAwarePaginator
     */
    public function searchPaginated(?string $search, int $perPage = 15);

    /**
     * Retrieve completed exam sessions for a specific user.
     *
     * @return Collection
     */
    public function getUserResults(string $userId);
}
