<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assigment extends Model
{
    protected $fillable = [
        // 
    ];

    public function AssigmentSubmited()
    {
        return $this->belongsTo(Assigment::class);
    }
    
    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
}
