<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $fillable = [
        'course_category',
        'image',
        'user_id',
        'group_id'
    ];

    public function User()
    {
       return $this->belongsTo(User::class);
    }

    public function Group()
    {
       return  $this->belongsToMany(Group::class);
    }

    public function Course()
    {
        return $this->hasMany(Course::class);
    }
}
