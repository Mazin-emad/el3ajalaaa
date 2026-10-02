<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanReversedLabels extends Command
{
    protected $signature = 'app:clean-reversed-labels';
    protected $description = 'Clean legacy (عبارة معكوسة) notes from questions and assessments';

    public function handle(): int
    {
        $questions = DB::table('questions')
            ->where('text_ar', 'like', '%معكوس%')
            ->get();

        foreach ($questions as $question) {
            $cleaned = str_replace(
                [' (عبارة معكوسة)', '(عبارة معكوسة)', ' (عبارة معكوسه)', '(عبارة معكوسه)'],
                '',
                $question->text_ar
            );

            DB::table('questions')
                ->where('id', $question->id)
                ->update(['text_ar' => trim($cleaned)]);
        }

        $assessments = DB::table('assessments')
            ->where('description_ar', 'like', '%معكوس%')
            ->get();

        foreach ($assessments as $assessment) {
            $cleanedDesc = preg_replace('/ ملحوظة:\s*العبارات.*معكوسة.*/u', '', $assessment->description_ar);
            DB::table('assessments')
                ->where('id', $assessment->id)
                ->update(['description_ar' => trim($cleanedDesc)]);
        }

        $this->info('Reversed labels cleaned successfully.');
        return Command::SUCCESS;
    }
}
