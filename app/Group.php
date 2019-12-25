<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group_name'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function CourseCategory()
    {
        return $this->belongsToMany(CourseCategory::class);
    }
}
