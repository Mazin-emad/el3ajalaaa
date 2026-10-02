<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = ['assessment_id', 'dimension_id', 'text_ar', 'order_index', 'is_reversed'];

    protected $casts = [
        'is_reversed' => 'boolean',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }

    public function answerOptions()
    {
        return $this->hasMany(AnswerOption::class)->orderBy('order_index');
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
