<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionMethod extends Model
{
    protected $fillable = [
        'method',
    ];

    public function Question()
    {
        return $this->hasMany(Question::class);
    }
}
