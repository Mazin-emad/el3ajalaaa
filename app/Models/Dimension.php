<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dimension extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = ['assessment_id', 'name_ar', 'max_score', 'order_index'];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function dimensionScores()
    {
        return $this->hasMany(DimensionScore::class);
    }

    public function interpretations()
    {
        return $this->hasMany(DimensionInterpretation::class);
    }
}
