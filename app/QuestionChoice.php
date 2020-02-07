<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    protected $fillable = [
        'choice',
        'question_id'
    ];

    public function Question()
    {
        return $this->belongsTo(Question::class);
    }

    public function Score()
    {
        return $this->belongsTo(Score::class);
    }
}
