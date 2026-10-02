<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {}

    public function index(Request $request): View
    {
        $search = $request->query('search');
        $users = $this->userService->searchPaginated($search);

        return view('admin.users.index', compact('users', 'search'));
    }

    public function userResults(User $user): JsonResponse
    {
        $sessions = $this->userService->getUserResults($user->id);

        $levelTranslations = [
            'high' => 'مرتفع',
            'medium' => 'متوسط',
            'low' => 'منخفض',
        ];

        $formatted = $sessions->map(function ($session) use ($levelTranslations) {
            return [
                'id' => $session->id,
                'assessment_title' => $session->assessment->title_ar,
                'completed_at' => $session->completed_at ? $session->completed_at->format('Y-m-d H:i') : null,
                'total_score' => $session->result ? $session->result->total_score : 0,
                'max_possible_score' => $session->result ? $session->result->max_possible_score : 0,
                'level' => $session->result ? ($levelTranslations[$session->result->level] ?? $session->result->level) : 'غير متوفر',
                'level_raw' => $session->result ? $session->result->level : 'unknown',
            ];
        });

        return response()->json([
            'success' => true,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
            'results' => $formatted,
        ]);
    }
}
