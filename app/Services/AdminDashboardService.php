<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\ExamSession;
use Illuminate\Support\Facades\DB;

class AdminDashboardService
{
    /**
     * Build all data needed for the admin dashboard.
     *
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        $totalUsers = DB::table('users')->where('role', 'user')->count();
        $todaySessions = DB::table('exam_sessions')
            ->where('status', 'completed')
            ->whereDate('completed_at', today())
            ->count();

        /*
         * Most-used assessment: join exam_sessions and count completed ones
         * to avoid the N+1 withCount pattern.
         */
        $mostUsedAssessment = Assessment::withCount([
            'examSessions' => fn ($q) => $q->where('status', 'completed'),
        ])
            ->orderByDesc('exam_sessions_count')
            ->first();

        $avgScore = DB::table('results')->avg('total_score');

        /*
         * Recent sessions: JOIN users, assessments, results in a single query.
         */
        $recentSessions = ExamSession::where('status', 'completed')
            ->with(['user', 'assessment', 'result'])
            ->orderByDesc('completed_at')
            ->limit(10)
            ->get();

        return compact(
            'totalUsers',
            'todaySessions',
            'mostUsedAssessment',
            'avgScore',
            'recentSessions'
        );
    }
}
