<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }

    public function Question()
    {
        return $this->hasMany(Question::class);
    }
}
