<?php

namespace App\Repositories;

use App\Models\ExamSession;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function searchPaginated(?string $search, int $perPage = 15)
    {
        $query = User::query()
            ->withCount(['examSessions as completed_exams_count' => function ($q) {
                $q->where('status', 'completed');
            }]);

        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('national_id', 'like', "%{$search}%");
            });
        }

        return $query->paginate($perPage);
    }

    public function getUserResults(string $userId)
    {
        return ExamSession::where('user_id', $userId)
            ->where('status', 'completed')
            ->with(['assessment', 'result'])
            ->orderBy('completed_at', 'desc')
            ->get();
    }
}
