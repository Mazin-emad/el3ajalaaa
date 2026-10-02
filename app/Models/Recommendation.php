<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recommendation extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'assessment_id', 'level', 'title_ar', 'description_ar',
        'strengths_ar', 'development_areas_ar', 'how_to_learn_ar', 'practical_tips_ar',
        'certificates_ar', 'certificates_intro_ar',
        'programs_ar', 'programs_intro_ar', 'programs_outro_ar',
        'plan_30_days_ar', 'plan_30_days_intro_ar',
        'high_threshold', 'low_threshold',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    protected $casts = [
        'strengths_ar' => 'array',
        'development_areas_ar' => 'array',
        'how_to_learn_ar' => 'array',
        'practical_tips_ar' => 'array',
        'certificates_ar' => 'array',
        'programs_ar' => 'array',
        'plan_30_days_ar' => 'array',
    ];
}
