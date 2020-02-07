<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssigmentSubmited extends Model
{
    protected $fillable = [
        //
    ];

    public function Assigment()
    {
        return $this->belongsTo(Assigment::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
