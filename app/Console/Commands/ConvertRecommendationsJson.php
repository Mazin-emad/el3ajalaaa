<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ConvertRecommendationsJson extends Command
{
    protected $signature = 'app:convert-recommendations-json';
    protected $description = 'Convert legacy recommendation text fields to structured JSON format';

    public function handle(): int
    {
        $recommendations = DB::table('recommendations')->get();

        foreach ($recommendations as $rec) {
            $certs = [];
            if (!empty($rec->certificates_ar) && !is_array(json_decode($rec->certificates_ar, true))) {
                $lines = array_filter(array_map('trim', explode("\n", $rec->certificates_ar)));
                foreach ($lines as $line) {
                    $certs[] = [
                        'title' => mb_substr($line, 0, 30),
                        'subtitle' => $line,
                        'icon' => 'blue-hexagon'
                    ];
                }
            }

            $progs = [];
            if (!empty($rec->programs_ar) && !is_array(json_decode($rec->programs_ar, true))) {
                $lines = array_filter(array_map('trim', explode("\n", $rec->programs_ar)));
                foreach ($lines as $line) {
                    $progs[] = [
                        'title' => $line,
                        'icon' => 'bi-journal-bookmark'
                    ];
                }
            }

            $plans = [];
            if (!empty($rec->plan_30_days_ar) && !is_array(json_decode($rec->plan_30_days_ar, true))) {
                $lines = array_filter(array_map('trim', explode("\n", $rec->plan_30_days_ar)));
                $week = 1;
                $arabicWeeks = [1 => 'الأسبوع الأول', 2 => 'الأسبوع الثاني', 3 => 'الأسبوع الثالث', 4 => 'الأسبوع الرابع'];
                foreach ($lines as $line) {
                    $plans[] = [
                        'period' => $arabicWeeks[$week] ?? "الأسبوع {$week}",
                        'title' => $line,
                        'icon' => 'bi-calendar-check'
                    ];
                    $week++;
                }
            }

            $updateData = [];
            if (!empty($certs)) {
                $updateData['certificates_ar'] = json_encode($certs, JSON_UNESCAPED_UNICODE);
            }
            if (!empty($progs)) {
                $updateData['programs_ar'] = json_encode($progs, JSON_UNESCAPED_UNICODE);
            }
            if (!empty($plans)) {
                $updateData['plan_30_days_ar'] = json_encode($plans, JSON_UNESCAPED_UNICODE);
            }

            if (!empty($updateData)) {
                DB::table('recommendations')->where('id', $rec->id)->update($updateData);
            }
        }

        $this->info('Recommendation fields successfully converted to JSON.');
        return Command::SUCCESS;
    }
}
