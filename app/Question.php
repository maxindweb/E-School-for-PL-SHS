<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'question',
        'quiz_id',
        'question_method'
    ];

    public function Method()
    {
        return $this->belongsTo(Method::class);
    }

    public function StudentAnswer()
    {
        return $this->hasMany(StudentAnswer::class);
    }

    public function QuestionChoice()
    {
        return $this->hasMany(QuestionChoice::class);
    }
}
