<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'session_id', 'total_score', 'max_possible_score', 'level', 'calculated_at',
    ];

    protected $casts = [
        'calculated_at' => 'datetime',
    ];

    public function examSession()
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }

    public function dimensionScores()
    {
        return $this->hasMany(DimensionScore::class);
    }
}
