<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasUuids;

    protected $fillable = ['session_id', 'question_id', 'selected_option_id', 'score_earned'];

    public function examSession()
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function selectedOption()
    {
        return $this->belongsTo(AnswerOption::class, 'selected_option_id');
    }
}
